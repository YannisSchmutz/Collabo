<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\ViewModel\CommunityViewModel;
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

        $projects = Project::take(self::MAX_COUNT_PER_PAGE)
            ->orderBy('id', 'desc')
            ->get();

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProjects($projects);

        return view('pages.community')->with(['data' => $communityViewModel]);
    }

    public function searchProject(Request $request){
        $search = $request->input('searchterm');

        $projects = Project::where('name', 'like', '%' . $search . '%')
            ->orWhere('pitch', 'like', '%' . $search . '%')
            ->take(self::MAX_COUNT_PER_PAGE)
            ->get();

        $html = view('components.ajaxProjectlist')
            ->with('data', $projects)
            ->render();
        return response()->json(
            array(
                'html'=> $html,
                'searchterm' => $search
            ),
            200
        );
    }
}
