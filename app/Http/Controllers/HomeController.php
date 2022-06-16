<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::take(10)->where('deleted_at', '=', null)->orderBy('created_at')->get();
        $brands = Brand::take(10)->where('deleted_at', '=', null)->orderBy('created_at')->get();

        return view('index', compact('products', 'brands'));
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
