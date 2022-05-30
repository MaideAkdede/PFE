<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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

        if (Route::currentRouteName() === 'drinks') {
            $products = Product::drinks()->paginate(5);
            $route = "/boissons/";
            $title = 'Drinks';
        } else if (Route::currentRouteName() === 'snacks') {
            $products = Product::snacks()->paginate(5);
            $route = "/snacks/";
            $title = 'Snacks';
        } else {
            abort(404);
        }

        return view('products.index', [
            'products' => $products,
            'title' => $title,
            'route' => $route,
        ]);
    }

    public function showDrink(Product $product)
    {
        if ($product->category->slug == 'boisson') {
            $title = "{$product->name} de {$product->brand->name}";
            return view('products.show', compact('product', 'title'));
        } else {
            abort(404);
        }
    }

    public function showSnack(Product $product)
    {
        if ($product->category->slug == 'snack') {
            $title = "{$product->name} de {$product->brand->name}";
            return view('products.show', compact('product', 'title'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        $title = 'Ajouter un nouveau produit';
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('title', 'categories', 'brands'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' =>  ['required', Rule::unique('products', 'name')],
            'price' => 'required',
            'number' => 'required',
            'quantity' => 'required',
            'unity' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'brand_id' => ['required', Rule::exists('brands', 'id')],
        ]);
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        $attributes['created_at'] = now();
        Product::create($attributes);
        return back()->with('message', 'Le produit a bien été ajouté');
    }
}
