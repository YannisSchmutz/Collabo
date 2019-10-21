<?php

namespace App\Http\Controllers;

use App\Http\ViewModel\ProfileViewmodel;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Collabo!';
        return view('pages.index')->with('title', $title);
    }

    public function profile()
    {
        $profileViewmodel = new ProfileViewmodel();
        $profileViewmodel->setPitch('I am an awesome person! I love Blockchains, serverless computing and all other Buzzwordy Stuff!');
        $profileViewmodel->setFirstname('Melanie');
        $profileViewmodel->setLastname('Müller');
        $profileViewmodel->setCaption('Cyber Enthusiast | Blockchain Engineer');
        $profileViewmodel->setInterests(['Blockchain', 'Security', 'Python']);
        $profileViewmodel->setPicPath('/profile.jpg');
        $profileViewmodel->setProjects(['Proj1', 'Proj2']);

        return view('profile')->with(['data' => $profileViewmodel]);
    }
}
