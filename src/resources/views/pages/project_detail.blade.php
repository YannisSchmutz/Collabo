@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @component('components/pitchBox', ['picPath' =>$data->getPicPath(), 'urlPath' =>Request::path(),
                                                   'langFile' => 'projecttext'])
                    {{$data->getPitch()}}
                @endcomponent
            </div>
            <div class="col-md-9">
                @component('components/captionBox', ['title' =>$data->getName(), 'caption' =>$data->getCaption(),
                                                     'urlPath' =>Request::path(), 'langFile' => 'projecttext'])
                @endcomponent

                @component('components/interestBox', ['interestsToDisplay' =>$data->getProjectInterests(),
                                                      'possibleInterestsToAdd' =>$data->getPossibleInterestsToAdd(),
                                                      'urlPath' =>Request::path()])
                    @lang('projecttext.interests_title')
                @endcomponent

                @component('components/descriptionBox', ['text' =>$data->getDescription()])
                    @lang('projecttext.description_title')
                @endcomponent
            </div>
        </div>
    </div>
@endsection
