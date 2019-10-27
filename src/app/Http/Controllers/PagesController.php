<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\ViewModel\ProfileViewmodel;
use App\Http\ViewModel\ProjectsViewModel;

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

    public function projects(){

        $ownedProjects = [];
        $relatedProjects = [];
        foreach(auth()->user()->projects as $project){
            if($project->pivot->permission == 'owner') {
                array_push ( $ownedProjects, $project);
            }else {
                array_push ( $relatedProjects, $project);
            }
        }

        $projectsViewmodel = new ProjectsViewModel();
        $projectsViewmodel->setOwnedProjects($ownedProjects);
        $projectsViewmodel->setRelatedProjects($relatedProjects);

        return view('pages.projects')->with(['data' => $projectsViewmodel]);
    }
}
