<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function create()
    {
        // this function will show the page
        $title = "Page d'inscription";
        return view('sessions.register.create', compact('title'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10', 'regex:/^(04)\d{8}$/'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
        ]);

        // Store datas into database
        $user = User::create($attributes);

        // Login
        auth()->login($user);

        return redirect('/')->with('success', 'Bienvenue sur TopSoda !');
    }

}
