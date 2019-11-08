<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\Model\User;
use App\Http\ViewModel\CommunityViewModel;
use App\Http\ViewModel\ProjectListItemViewModel;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    private const MAX_COUNT_PER_PAGE  = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $projects = Project::orderBy('created_at', 'desc')
            ->paginate(self::MAX_COUNT_PER_PAGE);

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProjects($projects);

        $removableProjectIds = array();
        foreach(auth()->user()->projects as $project){
            array_push ( $removableProjectIds, $project->id);
        }

        $projectViewModels = array();
        foreach($projects as $project){
            $projectViewModel = new ProjectListItemViewModel();
            $projectViewModel->setProject($project);
            $projectViewModel->setIsRemovable(
                in_array($project->id, $removableProjectIds)
            );
            array_push($projectViewModels, $projectViewModel);
        }

        $communityViewModel->setProjectListItemViewModels($projectViewModels);

        $profiles = User::orderBy('created_at', 'desc')
            ->paginate(self::MAX_COUNT_PER_PAGE);

        $communityViewModel->setProfiles($profiles);

        return view('pages.community')->with('data', $communityViewModel);
    }

    public function searchProject(Request $request){
        $search = $request->input('searchterm');

        if(empty($search)){
            $search = '';
            $projects = Project::orderBy('created_at', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }else{
            $projects = Project::where('name', 'like', '%' . $search . '%')
                ->orWhere('pitch', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProjects($projects);

        $removableProjectIds = array();
        foreach(auth()->user()->projects as $project){
            array_push ( $removableProjectIds, $project->id);
        }
        $communityViewModel->setRemovableProjectIds($removableProjectIds);

        $html = view('components.ajaxProjectList')
            ->with('data', $communityViewModel)
            ->render();

        return response()->json(
            array(
                'html'=> $html,
                'searchterm' => $search,
                'resultElementId' => $request->input('resultElementId')
            ),
            200
        );
    }

    public function searchProfile(Request $request){
        $search = $request->input('searchterm');

        if(empty($search)){
            $search = '';
            $profiles = User::orderBy('created_at', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }else{
            $profiles = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('pitch', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProfiles($profiles);

        $html = view('components.ajaxProfileList')
            ->with('data', $communityViewModel)
            ->render();

        return response()->json(
            array(
                'html'=> $html,
                'searchterm' => $search,
                'resultElementId' => $request->input('resultElementId')
            ),
            200
        );
    }
}
