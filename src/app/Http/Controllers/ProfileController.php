<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\ViewModel\ProfileViewmodel;
use App\Http\Model\Interest;
use App\Http\ViewModel\ProjectListItemViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     * The auth middleware will stop unauthenticated access and redirect to the login page
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
        $userInterestNames = [];
        foreach ($user_interests as $interest){
            array_push($userInterestNames, $interest->name);
        }

        $projectViewModels = array();
        foreach($user->projects as $project){
            $projectViewModel = new ProjectListItemViewModel();
            $projectViewModel->setProject($project);
            $projectViewModel->setIsRemovable(true);
            $projectViewModel->setRedirect('profile');
            array_push($projectViewModels, $projectViewModel);
        }

        // Unfortunately the usage of this help-array is needed because PHP sucks!
        $userInterestNames = [];
        $userInterests = [];
        foreach ($user->interests as $interest){
            array_push($userInterestNames, $interest->name);
            array_push($userInterests, ['name' => $interest->name, 'id' => $interest->id]);
        }

        $allInterests = Interest::all();
        $possibleInterestsToAdd = [];
        foreach ($allInterests as $interest){
            $interestName = $interest->name;
            // Only display interests that are not already in the user-interests
            if (!in_array ( $interestName, $userInterestNames )){
                array_push($possibleInterestsToAdd, ['name' => $interest->name, 'id' => $interest->id]);
            }
        }
        $profileViewmodel = new ProfileViewmodel();
        $profileViewmodel->setPitch($user->pitch);
        $profileViewmodel->setName($user->name);
        $profileViewmodel->setCaption($user->caption);
        $profileViewmodel->setUserInterests($userInterests);
        $profileViewmodel->setPossibleInterestsToAdd($possibleInterestsToAdd);
        $profileViewmodel->setPicPath($user->profile_picture);
        $profileViewmodel->setProjects($projectViewModels);

        return view('profile')->with([
            'data' => $profileViewmodel,
            'infoMessage' => 'Hello again : )'
        ]);
    }

    public function editPitchbox(Request $request)
    {
        Gate::authorize('edit-profile', $request->user());

        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'pitch' => 'required',
            'profilepic' => 'nullable'
        ]);
        $user = auth()->user();

        $file = $request->file('profilepic');
        if($file != null){
            $picname = auth()->user()->getAuthIdentifier().$file->getClientOriginalName();
            $file->move('./pictures/', $picname);
            $user->profile_picture = "/pictures/".$picname;
        }

        $user->pitch = $request->pitch;
        $user->save();

        return redirect(app()->getLocale().'/profile');
        //return $request->all();
    }

    public function editCaption(Request $request){
        Gate::authorize('edit-profile', $request->user());
        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'fullname' => 'required',
            'caption' => 'required'
        ]);
        $user = auth()->user();
        $user->caption = $request->caption;
        $user->name = $request->fullname;
        $user->save();
        return redirect(app()->getLocale().'/profile');
    }

    public function addInterest(Request $request){
        Gate::authorize('edit-profile', $request->user());

        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'interest_id_to_add' => 'required',
        ]);
        $user = auth()->user();
        // TODO: Validate interest
        // todo: What happens if interest_id not in Interest-collection?
        // todo: What happens if interest_id already in User-Interest-collection?
        $interestToAdd = Interest::find($request->interest_id_to_add);
        $user->interests()->save($interestToAdd);
        $user->save();

        return redirect(app()->getLocale().'/profile');
    }

    public function removeInterest(Request $request){
        Gate::authorize('edit-profile', $request->user());

        //Todo: Send error-message to frontend if this fails
        $this->validate($request, [
            'interest_id_to_remove' => 'required',
        ]);

        $user = auth()->user();
        // TODO: Validate interest
        $interestToRemove = Interest::find($request->interest_id_to_remove);
        $user->interests()->detach($interestToRemove);
        $user->save();

        return redirect(app()->getLocale().'/profile');
    }
}
