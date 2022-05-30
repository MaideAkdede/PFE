<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $drinks = Product::drinks()->take(6)->get();
        $snacks = Product::snacks()->take(6)->get();
        return view('index', [
            'drinks' => $drinks,
            'snacks' => $snacks,
            'title' => 'Page d‘accueil',
        ]);
    }
}
