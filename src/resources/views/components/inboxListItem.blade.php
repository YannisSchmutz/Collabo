<li class="list-group-item container">
    <div class="row">
        <div class="col-sm-2">
            <img src="{{$message->getPicpath()}}" alt="Anfragebild" class="img-thumbnail img-fluid" />
        </div>

        @if ($message->getMessagetype() == "USER")
            <div class="col-sm">
                <h5 class="m-0">{{__('inbox_text.inbox_title_user', ['projectname' => $message->getProjectname(), 'username' => $message->getUsername()])}}</h5>
                <br>
                <p>{{__('inbox_text.inbox_details')}}
                    <a href="{{route('projectsdetails', [app()->getLocale(), 'id' => $message->getProjectId()])}}"><i class="fas fa-eye ml-2 mr-2"></i></a>
                </p>
                <p>{{__('inbox_text.inbox_text_project', ['projectname' => $message->getProjectname(), 'username' => $message->getUsername()])}}</p>
            </div>
            <a href="{{route('user_accept_project', [app()->getLocale(), 'userid' => $message->getUserId(), 'projectid' => $message->getProjectId()])}}" role="button" class="btn btn-success mr-2 p-4 text-center"><br><i class="far fa-check-circle "></i></a>
            <a href="{{route('user_decline_project', [app()->getLocale(), 'userid' => $message->getUserId(), 'projectid' => $message->getProjectId()])}}" role="button" class="btn btn-danger mr-2 p-4"><br><i class="far fa-times-circle mt-auto"></i></a>
        @endif

        @if ($message->getMessagetype() == "PROJECT")
            <div class="col-sm">
                <h5 class="m-0">{{__('inbox_text.inbox_title_project', ['projectname' => $message->getProjectname(), 'username' => $message->getUsername()])}}</h5>
                <br>
                <p>{{__('inbox_text.inbox_details')}}
                    <a href="{{route('profiledetails', [app()->getLocale(), 'id' => $message->getUserId()])}}"><i class="fas fa-eye ml-2 mr-2"></i></a>
                </p>
                <p>{{__('inbox_text.inbox_text_project', ['projectname' => $message->getProjectname(), 'username' => $message->getUsername()])}}</p>
            </div>

            <a href="{{route('project_accept_user', [app()->getLocale(), 'userid' => $message->getUserId(), 'projectid' => $message->getProjectId()])}}" role="button" class="btn btn-success mr-2 p-4"><br><br><i class="far fa-check-circle m-auto"></i></a>
            <a href="{{route('project_decline_user', [app()->getLocale(), 'userid' => $message->getUserId(), 'projectid' => $message->getProjectId()])}}" role="button" class="btn btn-danger mr-2 p-4"><br><br><i class="far fa-times-circle m-auto"></i></a>
        @endif
    </div>
</li>
