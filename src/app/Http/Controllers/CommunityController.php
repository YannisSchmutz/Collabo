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
        $projects = Project::orderBy('id', 'desc')
            ->paginate(self::MAX_COUNT_PER_PAGE);

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProjects($projects);

        return view('pages.community')->with('data', $communityViewModel);
    }

    public function searchProject(Request $request){
        $search = $request->input('searchterm');

        if(empty($search)){
            $search = '';
            $projects = Project::orderBy('id', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }else{
            $projects = Project::where('name', 'like', '%' . $search . '%')
                ->orWhere('pitch', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate(self::MAX_COUNT_PER_PAGE);
        }

        $communityViewModel = new CommunityViewModel();
        $communityViewModel->setProjects($projects);

        $html = view('components.ajaxProjectList')
            ->with('data', $communityViewModel)
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
