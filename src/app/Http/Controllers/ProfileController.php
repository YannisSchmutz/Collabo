<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\ViewModel\ProfileViewmodel;
use App\Http\Model\Interest;
use App\Http\ViewModel\ProjectListItemViewModel;
use Illuminate\Database\QueryException;
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
        ]);
    }

    public function editPitchbox(Request $request)
    {
        Gate::authorize('edit-profile', $request->user());

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

        return redirect(app()->getLocale().'/profile')->with('info', 'Pitch box updated');
    }

    public function editCaption(Request $request){
        Gate::authorize('edit-profile', $request->user());

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

        $this->validate($request, [
            'interest_id_to_add' => 'required',
        ]);
        $user = auth()->user();
        $interestToAdd = Interest::find($request->interest_id_to_add);
        if ($interestToAdd == null){
            // Interest with given ID does not exist
            // Should not happen due to already being validated in frontend.
            return redirect(app()->getLocale().'/profile')->with('error',
                __('profiletext.interest_add_error'));
        }
        try {
            $user->interests()->save($interestToAdd);
        } catch (QueryException $e){
            return redirect(app()->getLocale().'/profile')->with('error',
                __('profiletext.interest_add_error'));
        }

        $user->save();

        return redirect(app()->getLocale().'/profile');
    }

    public function removeInterest(Request $request){
        Gate::authorize('edit-profile', $request->user());

        $this->validate($request, [
            'interest_id_to_remove' => 'required',
        ]);

        $user = auth()->user();
        $interestToRemove = Interest::find($request->interest_id_to_remove);
        if ($interestToRemove == null){
            // Interest with given ID does not exist
            // Should not happen due to already being validated in frontend.
            return redirect(app()->getLocale().'/profile')->with('error',
                __('profiletext.interest_remove_error'));
        }
        $user->interests()->detach($interestToRemove);
        $user->save();

        return redirect(app()->getLocale().'/profile');
    }
}
