<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\ViewModel\ProjectDetailViewModel;
use App\Http\ViewModel\ProjectsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;;

class ProjectsController extends Controller
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

    public function detail($id){

        $project = Project::find($id);

        $interests = $project->interests;
        $interest_names = [];
        foreach ($interests as $interest){
            array_push($interest_names, $interest->name);
        }

        $projectDetailViewModel = new ProjectDetailViewModel();
        $projectDetailViewModel->setName($project->name);
        $projectDetailViewModel->setPitch($project->pitch);
        $projectDetailViewModel->setCaption($project->caption);
        $projectDetailViewModel->setDescription($project->description);
        $projectDetailViewModel->setPicPath($project->project_picture);
        $projectDetailViewModel->setInterests($interest_names);


        return view('pages.project_detail')->with(['data' => $projectDetailViewModel]);
    }
}
