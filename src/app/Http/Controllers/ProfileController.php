<?php

namespace App\Http\Controllers;

use App\Http\ViewModel\ProfileViewmodel;
use App\Http\Model\Interest;
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

        $user_projects = $user->projects;
        $project_names = [];
        foreach ($user_projects as $project){
            array_push($project_names, $project->name);
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
        $profileViewmodel->setUserInterests($userInterestNames);
        $profileViewmodel->setPossibleInterestsToAdd($possibleInterestsToAdd);
        $profileViewmodel->setPicPath($user->profile_picture);
        $profileViewmodel->setProjects($project_names);

        return view('profile')->with(['data' => $profileViewmodel]);
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
            'interest_to_add' => 'required',
        ]);
        $user = auth()->user();
        // TODO: Validate interest
        // todo: What happens if interest_id not in Interest-collection?
        // todo: What happens if interest_id already in User-Interest-collection?
        $interestToAdd = Interest::find($request->interest_id);
        $user->interests()->save($interestToAdd);
        $user->save();

        return redirect(app()->getLocale().'/profile');
    }
}
