<?php

namespace App\Http\Controllers;

use App\Models\productimages;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('images')->orderBy('id', 'asc')->paginate(5);
        foreach ($products as $product) {
            foreach ($product->images as $image) {
                $image->base64 = base64_encode($image->image_product);
                // atau jika kamu ingin dynamic MIME:
                $mime = finfo_buffer(finfo_open(), $image->image_product, FILEINFO_MIME_TYPE);
                $image->base64src = 'data:' . $mime . ';base64,' . base64_encode($image->image_product);
            }
        }
        return view('dashboard.product', compact('products'));
    }

    //landing page
    public function showGallery()
    {
        $products = Product::with('mainImage')->orderBy('id', 'asc')->get();
        return view('home.product', compact('products'));
    }

    public function create()
    {
        return view('dashboard.product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'status' => 'required|string',
            'rating' => 'nullable|numeric',
            'berat' => 'nullable|numeric',
            'image_product.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::create($validated);

        // Simpan gambar jika diupload
        if ($request->hasFile('image_product')) {
            foreach ($request->file('image_product') as $file) {
                $image = new productimages();
                $image->product_id = $product->id;
                $image->image_product = file_get_contents($file->getRealPath());
                // $image->mime_type = $file->getMimeType(); // Jika kamu tambahkan kolom mime_type
                $image->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // public function showImage($id)
    // {
    //     $image = productimages::findOrFail($id);

    //     if (!$image || !$image->image_product) {
    //     return $this->serveDefaultImage(); // fallback jika tidak ada gambar
    // }

    //     $mime = $this->detectImageType($image->image_product);

    //     return response($image->image_product)
    //         ->header('Content-Type', $mime)
    //         ->header('Cache-Control', 'public, max-age=86400');
    // }

    public function edit(Product $product)
    {
        return view('dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'status' => 'required',
            'berat' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update product fields
        $product->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'status' => $request->status,
            'berat' => $request->berat,
            'image' => $request->image,
        ]);

        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/product_images', $filename);

            // Simpan ke tabel product_images
            productimages::create([
                'product_id' => $product->id,
                'image_path' => $filename,
            ]);
        }

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // // Hapus semua stocks yang terkait
        // $product->stocks()->delete();

        // Hapus produk
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
