<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Collabo!';
        return view('pages.index')->with('title', $title);
    }

    public function profile()
    {
        return view('profile');
    }
}
