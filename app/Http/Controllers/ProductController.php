<?php

namespace App\Http\Controllers;

use App\Models\productimages;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->orderBy('id', 'asc')->get();
        foreach ($products as $product) {
            foreach ($product->images as $image) {
                $image->base64 = base64_encode($image->image_product);
                $mime = finfo_buffer(finfo_open(), $image->image_product, FILEINFO_MIME_TYPE);
                $image->base64src = 'data:' . $mime . ';base64,' . base64_encode($image->image_product);
            }
        }
        return view('dashboard.product', compact('products'));
    }

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
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|string|in:available,unavailable,out_of_stock,hidden',
            'image_product.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
    DB::beginTransaction();

    // Step 1: Buat produk dulu dengan stok_id = 0 atau NULL
    $product = Product::create([
        'nama' => $validated['nama'],
        'deskripsi' => $validated['deskripsi'],
        'harga' => $validated['harga'],
        'stok_id' => 0, // atau coba NULL jika boleh
        'status' => $validated['status'],
    ]);

    // Step 2: Update stok_id dengan product ID
    $product->update(['stok_id' => $product->id]);

    // Step 3: Baru buat stock dengan ID yang sama
    $stock = new Stock();
    $stock->id = $product->id;
    $stock->quantity = $validated['quantity'];
    $stock->save();

    // Simpan gambar jika ada
    if ($request->hasFile('image_product')) {
        foreach ($request->file('image_product') as $file) {
            $image = new productimages();
            $image->product_id = $product->id;
            $image->image_product = file_get_contents($file->getRealPath());
            $image->save();
        }
    }

    DB::commit();
    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');

} catch (\Exception $e) {
    DB::rollBack();
    Log::error('Error creating product: ' . $e->getMessage());
    return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())->withInput();
}
    }

    public function edit(Product $product)
    {
        // Load images relationship
        $product->load('images');

        $product->load('stock');
        
        // Convert binary images to base64 for display
        foreach ($product->images as $image) {
            $mime = finfo_buffer(finfo_open(), $image->image_product, FILEINFO_MIME_TYPE);
            $image->base64src = 'data:' . $mime . ';base64,' . base64_encode($image->image_product);
        }
        
        // Load stock relationship if exists (for backward compatibility)
        if (method_exists($product, 'stock')) {
            $product->load('stock');
        }
        
        return view('dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|string|in:available,unavailable,out_of_stock,hidden',
            'image_product.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'delete_images' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
           // Update stock yang sudah ada
            if ($product->stok_id) {
                Stock::where('id', $product->stok_id)->update([
                    'quantity' => $validated['quantity']
                ]);
            }

            // Update product (tanpa mengubah stok_id)
            $product->update([
                'nama' => $validated['nama'],
                'deskripsi' => $validated['deskripsi'],
                'harga' => $validated['harga'],
                'status' => $validated['status'],
            ]);

            // Handle hapus gambar yang dipilih
            if ($request->filled('delete_images')) {
                $deleteImageIds = array_filter(explode(',', $request->delete_images));
                if (!empty($deleteImageIds)) {
                    productimages::whereIn('id', $deleteImageIds)
                        ->where('product_id', $product->id)
                        ->delete();
                }
            }

            // Handle upload gambar baru
            if ($request->hasFile('image_product')) {
                foreach ($request->file('image_product') as $file) {
                    $image = new productimages();
                    $image->product_id = $product->id;
                    $image->image_product = file_get_contents($file->getRealPath());
                    $image->save();
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate produk: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();

            // Hapus semua gambar terkait
            $product->images()->delete();

            // Hapus produk
            $product->delete();

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

    // Alternative method for using separate stock table (if needed)
    public function storeWithSeparateStock(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|string|in:available,unavailable,out_of_stock,hidden',
            'image_product.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // Buat stock record baru
            $stock = Stock::create([
                'quantity' => $validated['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Buat produk dengan stock_id
            $product = Product::create([
                'nama' => $validated['nama'],
                'deskripsi' => $validated['deskripsi'],
                'harga' => $validated['harga'],
                'stok_id' => $stock->id,
                'status' => $validated['status'],
            ]);

            // Simpan gambar
            if ($request->hasFile('image_product')) {
                foreach ($request->file('image_product') as $file) {
                    $image = new productimages();
                    $image->product_id = $product->id;
                    $image->image_product = file_get_contents($file->getRealPath());
                    $image->save();
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())->withInput();
        }
    }

    // Image serving methods
    protected function serveDefaultImage()
    {
        try {
            $defaultPath = public_path('img/kamira.png');

            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => mime_content_type($defaultPath),
                    'Cache-Control' => 'public, max-age=86400'
                ]);
            }

            // Generate placeholder image
            $img = imagecreatetruecolor(200, 200);
            $bgColor = imagecolorallocate($img, 245, 245, 245);
            $textColor = imagecolorallocate($img, 150, 150, 150);
            imagefill($img, 0, 0, $bgColor);
            imagestring($img, 5, 30, 90, 'Image Not Available', $textColor);

            ob_start();
            imagepng($img);
            $imageData = ob_get_clean();
            imagedestroy($img);

            return response($imageData, 200)->header('Content-Type', 'image/png');
        } catch (\Exception $e) {
            Log::critical('Default image failed: ' . $e->getMessage());
            abort(500, 'Could not load image');
        }
    }

    protected function detectImageType($imageData)
    {
        try {
            $signatures = [
                'ffd8ff' => 'image/jpeg',
                '89504e47' => 'image/png',
                '47494638' => 'image/gif',
                '52494646' => 'image/webp'
            ];

            $hex = bin2hex(substr($imageData, 0, 4));

            foreach ($signatures as $sig => $mime) {
                if (str_starts_with($hex, $sig)) {
                    return $mime;
                }
            }

            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            return $finfo->buffer($imageData) ?: 'image/jpeg';
        } catch (\Exception $e) {
            Log::error('MIME detection failed: ' . $e->getMessage());
            return 'image/jpeg';
        }
    }
}