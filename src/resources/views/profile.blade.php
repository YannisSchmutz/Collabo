@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @component('components/pitchBox', ['picPath' =>$data->getPicPath(), 'urlPath' =>Request::path(),
                                               'langFile' => 'profiletext'])
                {{$data->getPitch()}}
            @endcomponent
        </div>
        <div class="col-md-9">
            @component('components/captionBox', ['title' =>$data->getName(), 'caption' => $data->getCaption(),
                                                 'urlPath' =>Request::path(), 'langFile' => 'profiletext'])
            @endcomponent

            @component('components/interestBox', ['interestsToDisplay' =>$data->getUserInterests(),
                                                  'possibleInterestsToAdd' =>$data->getPossibleInterestsToAdd(),
                                                  'urlPath' =>Request::path()])
                    @lang('profiletext.interests_title')
            @endcomponent

            @component('components/projectList', ['data' =>$data->getProjects()])
                    @lang('profiletext.projectsts_title')
            @endcomponent
        </div>
    </div>
</div>
@endsection
