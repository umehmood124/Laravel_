<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFromController extends Controller
{
    public function create(){
        return view('contact.create');
    }
    public function store(){
        $data = request()->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'message'=> 'required',
        ]);
        Mail::to('mailforpython124@gmail.com')->send(new ContactFormMail($data));
        return redirect('contact')->with('message', 'Email Send Successfully. Thanks for your message. We will be in touch thanks..');
    }
}
