<?php

namespace App\Http\Controllers;

use App\Http\Model\User;

use App\Http\ViewModel\ProfileViewmodel;
use App\Http\ViewModel\ProjectsViewModel;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Collabo!';
        return view('pages.index')->with('title', $title);
    }
}
