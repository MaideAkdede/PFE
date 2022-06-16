<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('page.contact');
    }
    public function send(){
        $attributes = request()->validate([
            'full_name'=>'required|min:1',
            'email'=>'required|email',
            'subject'=>'required',
            'text'=>'required|min:25',
        ]);
        Mail::to($attributes['email'])->send(new Contact($attributes));
        return back()->with('message', 'Votre message à bien été envoyé !');
    }
}
