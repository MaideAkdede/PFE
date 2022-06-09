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
        $categories = Category::all()->sortBy('name');
        $brands = Brand::all()->sortBy('name');
        $subcategories = Subcategory::all()->sortBy('name');
        return view('products.create',
            compact(
                'title',
                'categories',
                'brands',
                'subcategories'
            ));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('products', 'name')],
            'price' => 'required',
            'number' => 'required',
            'quantity' => 'required',
            'unity' => 'required|min:1|max:2',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'brand_id' => ['required', Rule::exists('brands', 'id')],
            'add_new_brand' => [Rule::unique('brands', 'name'), 'nullable'],
            'subcategories' => ['required', Rule::exists('subcategories', 'id')],
            'add_new_subcategories' => ['nullable', Rule::unique('subcategories', 'name')],
        ]);


        if (request()->toggle_new_brand === "on" && request()->add_new_brand != "") {

            $new_brand = Brand::create([
                'name' => ucwords($attributes['add_new_brand']),
                'slug' => Str::slug($attributes['add_new_brand'], '-'),
            ]);

            $attributes['brand_id'] = $new_brand['id'];
        }

        // Add subs
        $subcategories = array_filter(array_unique(array_map(function ($subcategory) {
            return ucwords(trim($subcategory));
        }, explode(',', $attributes['add_new_subcategories']))), function ($subcategory) {
            return $subcategory != "";
        });
        $existing_subcategories = Subcategory::whereIn('name', $subcategories)->get();
        $subcategories_to_add = array_diff($subcategories, $existing_subcategories->pluck('name')->all());
        $subcategories_to_add = array_map(function ($subcategory) use ($attributes) {
            return [
                'name' => $subcategory,
                'slug' => Str::slug($subcategory),
                'category_id' => $attributes['category_id'],
            ];
        }, $subcategories_to_add);

        /* Image storage */
        $attributes['image'] = request()->file('image')->store('images');

        /* Create Product */
        $product = Product::create([
            'name' => ucwords($attributes['name']),
            'slug' => Str::slug($attributes['name'], '-'),
            'price' => $attributes['price'],
            'number' => $attributes['number'],
            'quantity' => $attributes['quantity'],
            'unity' => $attributes['unity'],
            'category_id' => $attributes['category_id'],
            'brand_id' => $attributes['brand_id'],
            'image' => $attributes['image'],
            'created_at' => now(),
        ]);


        if (request()->toggle_new_subcategories === "on" && request()->add_new_subcategories != "") {
            $created_new_subcategories = $product->subcategories()->createMany($subcategories_to_add);
            $existing_subcategories = $existing_subcategories->merge($created_new_subcategories);

            $product->subcategories()->syncWithoutDetaching($attributes['subcategories']);
            $product->subcategories()->syncWithoutDetaching($existing_subcategories);
        } else {
            $product->subcategories()->sync($attributes['subcategories']);
        }


        return back()->with('message', 'Le produit a bien été ajouté');
    }
}
