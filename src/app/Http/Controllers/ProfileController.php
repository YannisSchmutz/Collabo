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
        $user = auth()->user();

        $user_interests = $user->interests;
        $interest_names = [];
        foreach ($user_interests as $interest){
            array_push($interest_names, $interest->name);
        }

        $user_projects = $user->projects;
        $project_names = [];
        foreach ($user_projects as $project){
            array_push($project_names, $project->name);
        }


        $profileViewmodel = new ProfileViewmodel();
        $profileViewmodel->setPitch($user->pitch);
        $profileViewmodel->setName($user->name);
        $profileViewmodel->setCaption($user->caption);
        $profileViewmodel->setInterests($interest_names);
        $profileViewmodel->setPicPath($user->profile_picture);
        $profileViewmodel->setProjects($project_names);

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
