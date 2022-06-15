<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::take(10)->orderBy('created_at')->get();

        return view('index', [
            'products' => $products,
            'title' => 'Page d‘accueil',
        ]);
    }
}
