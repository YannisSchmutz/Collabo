@extends('layouts.app')


@section('content')
    <div class="container">

        <form action="{{route('storeProject', app()->getLocale())}}" method="post" id="createProjectForm" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="profilepic">@lang('projecttext.pic_form')</label>
                        <input type="file" class="form-control" id="profilepic" name="profilepic">
                    </div>
                    <div class="form-group">
                        <label for="pitch">@lang('projecttext.pitch_form')</label>
                        <input type="text" class="form-control" id="pitch" value="" name="pitch">
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="form-group">
                        <label for="fullname">@lang('projecttext.fullname_form')</label>
                        <input type="text" class="form-control" id="fullname" value="" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="caption">@lang('projecttext.caption_form')</label>
                        <input type="text" class="form-control" id="caption" value="" name="caption">
                    </div>

                    <div class="card p-2 form-group">
                        <label for="caption">@lang('projecttext.description_title')</label>
                        <textarea class="form-control" id="descriptionArea" name="descriptionArea"></textarea>
                    </div>

                </div>

                <div class="card">
                    <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
                </div>
            </div>

        </form>

    </div>
@endsection
