<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index(){
        return view('page.home');
    }
    public function about(){
        return view('page.about');
    }
    public function contact(){
        return view('page.contact');
    }

    public  function formsubmit(PostRequest $request)
    {
        $nama = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
    
        return redirect()->route('kontak')->with([
            'name' => $nama,
            'email' => $email,
            'message' => $message,
        ]);
    }
}


