<?php

namespace App\Http\Controllers;

use App\Http\Model\Interest;
use App\Http\Model\Project;
use App\Http\ViewModel\ProjectDetailViewModel;
use App\Http\ViewModel\ProjectListItemViewModel;
use App\Http\ViewModel\ProjectsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
            $projectListItemViewModel = new ProjectListItemViewModel();
            $projectListItemViewModel->setProject($project);
            $projectListItemViewModel->setIsRemovable(true);
            if($project->pivot->permission == 'owner') {
                array_push ( $ownedProjects, $projectListItemViewModel);
            }else {
                array_push ( $relatedProjects, $projectListItemViewModel);
            }
            $projectListItemViewModel->setRedirect('projects');
        }

        $projectsViewmodel = new ProjectsViewModel();
        $projectsViewmodel->setOwnedProjects($ownedProjects);
        $projectsViewmodel->setRelatedProjects($relatedProjects);

        return view('pages.projects')->with(['data' => $projectsViewmodel]);
    }

    public function detail($lang, $id){

        $project = Project::find($id);

        $projectInterestNames = [];  // Unfortunately the usage of this help-array is needed because PHP sucks!
        $projectInterests = [];
        foreach ($project->interests as $interest){
            array_push($projectInterestNames, $interest->name);
            array_push($projectInterests, ['name' => $interest->name, 'id' => $interest->id]);
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
        $projectDetailViewModel->setId($project->id);
        $projectDetailViewModel->setName($project->name);
        $projectDetailViewModel->setPitch($project->pitch);
        $projectDetailViewModel->setCaption($project->caption);
        $projectDetailViewModel->setDescription($project->description);
        $projectDetailViewModel->setPicPath($project->project_picture);
        $projectDetailViewModel->setProjectInterests($projectInterests);
        $projectDetailViewModel->setPossibleInterestsToAdd($possibleInterestsToAdd);


        return view('pages.project_detail')->with(['data' => $projectDetailViewModel]);
    }

    public function addInterest(Request $request, $lang, $id){
        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'interest_id_to_add' => 'required',
        ]);

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        // TODO: Validate interest
        // todo: What happens if interest_id not in Interest-collection?
        // todo: What happens if interest_id already in User-Interest-collection?
        $interestToAdd = Interest::find($request->interest_id_to_add);
        $project->interests()->save($interestToAdd);
        $project->save();

        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function removeInterest(Request $request, $lang, $id){
        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'interest_id_to_remove' => 'required',
        ]);

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        // TODO: Validate interest
        $interestToRemove = Interest::find($request->interest_id_to_remove);
        $project->interests()->detach($interestToRemove);
        $project->save();


        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function create(){
        return view('pages.project_create');
    }

    public function store(Request $request){

        // TODO: Validate
        // TODO: Make Image optional (nullable) but use "/pictures/general_placeholder.png" if there isn't any

        $user = auth()->user();

        // TODO: Add missing parameters
        $new_project = new Project();
        $new_project->name = $request->fullname;
        $new_project->pitch = $request->pitch;
        $new_project->caption = $request->caption;
        $new_project->description = $request->descriptionArea;
        $new_project->project_picture = "/pictures/general_placeholder.png";
        // Needs first save to have an ID for the new_project
        $new_project->save();
        // Save permission to the intermediate table.
        $new_project->users()->save($user, ['permission' => 'owner']);
        // Needs the second save to save the intermediate table.
        $new_project->save();
        $id = $new_project->id;

        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function editPitchbox(Request $request, $lang, $id)
    {
        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'pitch' => 'required',
            'profilepic' => 'nullable'
        ]);
        $project = Project::find($id);
        Gate::authorize('edit-project', $project);
        $file = $request->file('profilepic');
        if($file != null){
            $picname = $project->id.$file->getClientOriginalName();
            $file->move('./pictures/', $picname);
            $project->project_picture = "/pictures/".$picname;
        }

        $project->pitch = $request->pitch;
        $project->save();

        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function editCaption(Request $request, $lang, $id){

        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'fullname' => 'required',
            'caption' => 'required'
        ]);
        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $project->caption = $request->caption;
        $project->name = $request->fullname;
        $project->save();
        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function editDescriptionBox(Request $request, $lang, $id){

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $project->description = $request->descriptionArea;
        $project->save();
        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function unsubscribe(Request $request, $lang, $id){
        $project = auth()->user()->projects()->find($id);
        if($project->pivot->permission == 'owner') {
            $project->delete();
        }
        auth()->user()->projects()->detach($project);
        auth()->user()->save();

        $redirect = 'projects';
        if($request->input('redirect') != null){
            $redirect = $request->input('redirect');
        }
        return redirect(\route($redirect, app()->getLocale()));
    }
}
