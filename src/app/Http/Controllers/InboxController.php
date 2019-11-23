<?php

namespace App\Http\Controllers;

use App\Http\Model\Project;
use App\Http\ViewModel\InboxMessageViewModel;
use App\Http\ViewModel\ProfileViewmodel;
use App\Http\Model\Interest;
use App\Http\ViewModel\ProjectListItemViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class InboxController extends Controller
{
    private const USERMESSAGETYPE = "USER";
    private const PROJECTMESSAGETYPE = "PROJECT";
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
        $user_messages = [];
        $project_messages = [];

        foreach($user->likes as $like) {
            if($like->is_liked_by_project()) {
                $viewmodel = new InboxMessageViewModel();
                $viewmodel->setMessagetype(self::USERMESSAGETYPE);
                $viewmodel->setLikeId($like->Id);
                //ToDo get Project for forward Id and projektname
                array_push ( $user_messages, $viewmodel);
            }
        }

        foreach(auth()->user()->projects as $project) {
            if($project->pivot->permission === 'owner') {
                foreach ($project->likes as $like) {
                    if($like->is_liked_by_user()) {
                        $viewmodel = new InboxMessageViewModel();
                        $viewmodel->setMessagetype(self::PROJECTMESSAGETYPE);
                        $viewmodel->setLikeId($like->Id);
                        //ToDo get User for forward Id and username
                        //ToDo get Project for projektname
                        array_push ( $project_messages, $viewmodel);
                    }
                }
            }
        }

        $messages = array_merge($user_messages, $project_messages);
        return view('pages.inbox')->with(['data' => $messages]);
    }
}
