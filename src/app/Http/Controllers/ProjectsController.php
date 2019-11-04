<?php

namespace App\Http\Controllers;

use App\Http\Model\Interest;
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

        $projectInterests = $project->interests;
        $projectInterestNames = [];
        foreach ($projectInterests as $interest){
            array_push($projectInterestNames, $interest->name);
        }

        $allInterests = Interest::all();
        $possibleInterestsToAdd = [];
        foreach ($allInterests as $interest){
            $interestName = $interest->name;
            // Only display interests that are not already in the user-interests
            if (!in_array ( $interestName, $projectInterestNames )){
                array_push($possibleInterestsToAdd, ['name' => $interest->name, 'id' => $interest->id]);
            }
        }

        $projectDetailViewModel = new ProjectDetailViewModel();
        $projectDetailViewModel->setName($project->name);
        $projectDetailViewModel->setPitch($project->pitch);
        $projectDetailViewModel->setCaption($project->caption);
        $projectDetailViewModel->setDescription($project->description);
        $projectDetailViewModel->setPicPath($project->project_picture);
        $projectDetailViewModel->setProjectInterests($projectInterestNames);
        $projectDetailViewModel->setPossibleInterestsToAdd($possibleInterestsToAdd);


        return view('pages.project_detail')->with(['data' => $projectDetailViewModel]);
    }

    public function addInterest(Request $request, $id){

        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'interest_to_add' => 'required',
        ]);
        $project = Project::find($id);
        // TODO: Validate interest
        // todo: What happens if interest_id not in Interest-collection?
        // todo: What happens if interest_id already in User-Interest-collection?
        $interestToAdd = Interest::find($request->interest_id);
        $project->interests()->save($interestToAdd);
        $project->save();

        return redirect('projects/'.$id.'/detail');
    }
}
