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
                                                  'routeNameAdd' =>route('profileAddInterest', app()->getLocale()),
                                                  'routeNameRemove' =>route('profileRemoveInterest', app()->getLocale()),
                                                  'langFile' => 'profiletext'])
                    @lang('profiletext.interests_title')
            @endcomponent

                <div class="card mt-4 mb-4 p-2">
                    <h3 class="card-title">@lang('profiletext.projectsts_title')</h3>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($data->getProjects() as $projectVm)
                                @component('components/projectListItem',['projectVM' => $projectVm])
                                @endcomponent
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
