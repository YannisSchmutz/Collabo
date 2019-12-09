<?php

namespace App\Http\Controllers;

use App\Http\Model\Interest;
use App\Http\Model\Project;
use App\Http\Model\UserProject;
use App\Http\ViewModel\ProjectDetailViewModel;
use App\Http\ViewModel\ProjectListItemViewModel;
use App\Http\ViewModel\ProjectsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\QueryException;

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

        $memberRoles = [
            'owner',
            'readonly'
        ];

        $projectDetailViewModel = new ProjectDetailViewModel();
        $projectDetailViewModel->setId($project->id);
        $projectDetailViewModel->setName($project->name);
        $projectDetailViewModel->setPitch($project->pitch);
        $projectDetailViewModel->setCaption($project->caption);
        $projectDetailViewModel->setDescription($project->description);
        $projectDetailViewModel->setPicPath($project->project_picture);
        $projectDetailViewModel->setProjectInterests($projectInterests);
        $projectDetailViewModel->setPossibleInterestsToAdd($possibleInterestsToAdd);
        $projectDetailViewModel->setMembers($project->users);
        $projectDetailViewModel->setPossiblePermissions($memberRoles);


        return view('pages.project_detail')->with([
            'data' => $projectDetailViewModel,
        ]);
    }

    public function addInterest(Request $request, $lang, $id){
        $this->validate($request, [
            'interest_id_to_add' => 'required',
        ]);

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $interestToAdd = Interest::find($request->interest_id_to_add);
        if ($interestToAdd == null){
            // Interest with given ID does not exist
            // Should not happen due to already being validated in frontend.
            return redirect(app()->getLocale().'/projects/'.$id.'/detail')->with('errorMessages',
                [__('projecttext.interest_add_error')]);
        }

        try {
            $project->interests()->save($interestToAdd);
        } catch (QueryException $e){
            return redirect(app()->getLocale().'/projects/'.$id.'/detail')->with('errorMessages',
                [__('projecttext.interest_add_error')]);
        }

        $project->save();

        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function removeInterest(Request $request, $lang, $id){
        $this->validate($request, [
            'interest_id_to_remove' => 'required',
        ]);

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $interestToRemove = Interest::find($request->interest_id_to_remove);
        if ($interestToRemove == null){
            // Interest with given ID does not exist
            // Should not happen due to already being validated in frontend.
            return redirect(app()->getLocale().'/projects/'.$id.'/detail')->with('errorMessages',
                [__('projecttext.interest_remove_error')]);
        }
        $project->interests()->detach($interestToRemove);
        $project->save();


        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function create(){
        return view('pages.project_create');
    }

    public function store(Request $request){
        $user = auth()->user();

        $errorMessages = [];
        $this->validate(
            $request,
            [
                'fullname' => 'required',
                'pitch' => 'required',
                'caption' => 'required',
                'descriptionArea' => 'required',
                'profilepic' => 'nullable',
            ],
            $errorMessages
        );

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

        $file = $request->file('profilepic');
        //return $request->profilepic;
        if($file != null){
            //return "asfasf";
            $picname = $new_project->id.$file->getClientOriginalName();
            $file->move('./pictures/', $picname);
            $new_project->project_picture = "/pictures/".$picname;
        }

        // Needs the second save to save the intermediate table
        //  as well as the picture.
        $new_project->save();

        $id = $new_project->id;
        return redirect(app()->getLocale().'/projects/'.$id.'/detail')->with('errorMessages', $errorMessages);
    }

    public function editPitchbox(Request $request, $lang, $id)
    {
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

        $this->validate($request, [
            'descriptionArea' => 'required',
        ]);

        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $project->description = $request->descriptionArea;
        $project->save();
        return redirect(app()->getLocale().'/projects/'.$id.'/detail');
    }

    public function editPermissions(Request $request, $lang, $id){
        $project = Project::find($id);
        Gate::authorize('edit-project', $project);

        $postData = array_diff(request()->all(), request()->query());
        $valid = sizeof(
            array_filter(
                $postData,
                function($role, $id){
                    return $role == 'owner';
                 },
                ARRAY_FILTER_USE_BOTH
            )
        ) > 0;

        if(!$valid){
            return redirect()->back()->with('errorMessages',
                [__('projecttext.missing_owner_permission')]);
        }

        foreach($postData as $id=>$role){
            if($id == '_token'){continue;}
            $user = $project->users()->find($id);
            $user->pivot->permission = $role;
            $user->pivot->save();
        }
        return redirect()->back();
    }

    public function unsubscribe(Request $request, $lang, $id){
        $project = auth()->user()->projects()->find($id);
        if($project->pivot->permission == 'owner') {
            $project->delete();
        }
        auth()->user()->projects()->detach($project);
        auth()->user()->save();
        return redirect()->back();
    }
}
