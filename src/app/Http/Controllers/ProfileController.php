<?php

namespace App\Http\Controllers;

use App\Http\ViewModel\ProfileViewmodel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profileViewmodel = new ProfileViewmodel();
        $profileViewmodel->setPitch('I am an awesome person! I love Blockchains, serverless computing and all other Buzzwordy Stuff!');
        $profileViewmodel->setName('Melanie Müller');
        $profileViewmodel->setCaption('Cyber Enthusiast | Blockchain Engineer');
        $profileViewmodel->setInterests(['Blockchain', 'Security', 'Python']);
        $profileViewmodel->setPicPath('pictures/portrait_placeholder.png');
        $profileViewmodel->setProjects(['Proj1', 'Proj2']);

        return view('profile')->with(['data' => $profileViewmodel]);
    }

    public function editPitchbox(Request $request)
    {
        return redirect('profile');
    }

    public function editCaption(Request $request){
        return redirect('profile');
    }
}
