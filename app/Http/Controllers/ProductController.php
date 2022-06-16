<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = '';
        $title = '';
        $route = '';
        $subcategories = '';

        if (Route::currentRouteName() === 'drinks') {
            $products = Product::drinks()->paginate(5);
            $route = "/boissons/";
            $title = 'Toutes les boissons';
            $subcategories = Subcategory::drinks()->orderBy('name')->get();
        } else if (Route::currentRouteName() === 'snacks') {
            $products = Product::snacks()->paginate(5);
            $route = "/snacks/";
            $title = 'Tous les snacks';
            $subcategories = Subcategory::snacks()->orderBy('name')->get();

        } else {
            abort(404);
        }

        return view('products.index', [
            'products' => $products,
            'title' => $title,
            'route' => $route,
            'subcategories' => $subcategories,
        ]);
    }

    public function showDrink(Product $product)
    {
        if ($product->category->slug == 'boisson') {
            $similars = Product::where('deleted_at', '=', null)->where('id','<>', $product->id)->take(6)->get();
            $title = "{$product->name} de {$product->brand->name}";
            return view('products.show', compact('product','similars', 'title'));
        } else {
            abort(404);
        }
    }

    public function showSnack(Product $product)
    {
        if ($product->category->slug == 'snack') {
            $similars = Product::snacks()->where('deleted_at', '=', null)->where('id','<>', $product->id)->take(6)->get();
            $title = "{$product->name} de {$product->brand->name}";
            return view('products.show', compact('product','similars', 'title'));
        } else {
            abort(404);
        }
    }

}
