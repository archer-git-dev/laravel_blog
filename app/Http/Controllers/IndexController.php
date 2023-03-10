<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function  index() {
        return view('home');
    }

    public function  blog() {
        return view('blog');
    }

    public function  about() {
        return view('about');
    }

    public function  contact() {
        return view('contact');
    }
    public function  postDetails() {
        return view('post-details');
    }

    public function  signin() {
        return view('signin');
    }

    public function  signup() {
        return view('signup');
    }

}
