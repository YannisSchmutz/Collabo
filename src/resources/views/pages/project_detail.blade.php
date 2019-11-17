@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @component('components/pitchBox', ['picPath' =>$data->getPicPath(), 'routeName' =>route('projectEditPitchbox', [app()->getLocale(), 'id' => $data->getId()]),
                                                   'langFile' => 'projecttext'])
                    {{$data->getPitch()}}
                @endcomponent
            </div>
            <div class="col-md-9">
                @component('components/captionBox', ['title' =>$data->getName(), 'caption' =>$data->getCaption(),
                                                     'routeName' =>route('projectEditCaption', [app()->getLocale(), 'id' => $data->getId()]), 'langFile' => 'projecttext'])
                @endcomponent

                @component('components/interestBox', ['interestsToDisplay' =>$data->getProjectInterests(),
                                                      'possibleInterestsToAdd' =>$data->getPossibleInterestsToAdd(),
                                                      'routeName' =>route('projectAddInterest', [app()->getLocale(), 'id' => $data->getId()]),
                                                      'langFile' => 'projecttext'])
                    @lang('projecttext.interests_title')
                @endcomponent

                @component('components/descriptionBox', ['text' =>$data->getDescription(), 'routeName' =>route('projectEditDescriptionBox', [app()->getLocale(), 'id' => $data->getId()])])
                    @lang('projecttext.description_title')
                @endcomponent
            </div>
        </div>
    </div>
@endsection
