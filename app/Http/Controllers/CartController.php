<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('auth.cart', compact('cart'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'product_id' => 'required|exists:products,id'
        ]);


        $attributes['pack_number'] = '1';
        $attributes['user_id'] = \auth()->user()->id;
        $product = Cart::create($attributes);

        return back()->with('success', "$product->name has been added");

    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', "Article retiré du panier");
    }
}
