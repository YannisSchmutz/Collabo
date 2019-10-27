@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @component('components/pitchbox', ['picPath' =>$data->getPicPath()])
                {{$data->getPitch()}}
            @endcomponent
        </div>
        <div class="col-md-9">
            @component('components/captionBox', ['title' =>$data->getName(), 'caption' => $data->getCaption()])
            @endcomponent

            @component('components/interestbox', ['data' =>$data->getInterests()])
                    @lang('profiletext.interests_title')
            @endcomponent

            @component('components/projectlist', ['data' =>$data->getProjects()])
                    @lang('profiletext.projectsts_title')
            @endcomponent
        </div>
        <?php echo App::getLocale(); ?>
    </div>
</div>
@endsection
