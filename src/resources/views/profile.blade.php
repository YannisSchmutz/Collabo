@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @component('components/pitchBox', ['picPath' =>$data->getPicPath(), 'routeName' => route('profileEditPitchbox', app()->getLocale()),
                                               'langFile' => 'profiletext'])
                {{$data->getPitch()}}
            @endcomponent
        </div>
        <div class="col-md-9">
            @component('components/captionBox', ['title' =>$data->getName(), 'caption' => $data->getCaption(),
                                                 'routeName' =>route('profileEditCaption', app()->getLocale()), 'langFile' => 'profiletext'])
            @endcomponent

            @component('components/interestBox', ['interestsToDisplay' =>$data->getUserInterests(),
                                                  'possibleInterestsToAdd' =>$data->getPossibleInterestsToAdd(),
                                                  'routeName' =>route('profileAddInterest', app()->getLocale()),
                                                  'langFile' => 'profiletext'])
                    @lang('profiletext.interests_title')
            @endcomponent

            @component('components/projectList', ['data' =>$data->getProjects()])
                    @lang('profiletext.projectsts_title')
            @endcomponent
        </div>
    </div>
</div>
@endsection
