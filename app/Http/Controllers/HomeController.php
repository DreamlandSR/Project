<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'judul' => 'Home',
            'css' => ['nav.css', 'styles.css', 'ionicons.min.css'],
            'minimal_header' => true
        ]);
    }


    public function login() {
        $data = [
            'judul' => 'Login',
            'css' => ['styles.css', 'ionicons.min.css'],
            'minimal_header' => true
        ];

        return view('home.login', $data);
    }

    public function about() {
        $data = [
            'judul' => 'About',
            'css' => ['nav.css', 'styles.css', 'ionicons.min.css'],
            'minimal_header' => true,
            'js' => 'script.js'
        ];

        return view('home.about', $data);
    }

    public function guide() {
        $data = [
            'judul' => 'Guide',
            'css' => ['nav.css', 'styles.css', 'ionicons.min.css'],
            'minimal_header' => true,
            'js' => 'script.js'
        ];

        return view('home.guide', $data);
    }

    public function product() {
        $data = [
            'judul' => 'Product',
            'css' => ['nav.css', 'styles.css', 'ionicons.min.css'],
            'minimal_header' => true,
            'js' => 'script.js'
        ];

        return view('home.product', $data);
    }
}
