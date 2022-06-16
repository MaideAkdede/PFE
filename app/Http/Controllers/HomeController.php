<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
    public function search(){
        $request = request()->query('recherche');
        $products ='';
        $brands ='';
        $total='0';
        if($request){
            $products = Product::where('name', 'LIKE', "%{$request}%")->paginate(12);
            $brands = Brand::where('deleted_at', '=',null)->where('name', 'LIKE', "%{$request}%")->paginate(12);
            $total = count($products) + count($brands);
        }
        return view('page.search', compact('products', 'brands', 'request', 'total'));
    }
}
