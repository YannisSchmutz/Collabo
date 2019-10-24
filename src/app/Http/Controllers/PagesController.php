<?php

namespace App\Http\Controllers;

use App\Http\ViewModel\ProfileViewmodel;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Collabo!';
        return view('pages.index')->with('title', $title);
    }
}
