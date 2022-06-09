<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginLogoutController extends Controller
{
    public function create()
    {
        $title = "Connexion";
        return view('sessions.login.create', compact('title'));
    }

    public function store()
    {
        // validate the request
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($credentials)) {
            // session fixation
            session()->regenerate();
            // redirect
            return redirect('/')->with('success', 'Bonjour, content de vous revoir');
        }

        // redirect if auth fail
        return back()->withInput()->withErrors(['email' => 'Adresse email ou mot de passe incorrect']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Aurevoir');
    }
}
