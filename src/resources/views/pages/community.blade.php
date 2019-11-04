@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <h3>{{ __('projects') }}</h3>
        <form method="POST" action="{{ URL::to('searchProject') }}" id="projectSearchForm" class="row mb-2">
            {{ csrf_field() }}
            <div class="col-6 input-group">
                <input type="text" class="form-control" id="projectSearchText" name="projectSearchText" placeholder="{{ __('communitytext.project_search') }}">
                <div class="input-group-btn">
                    <button type="submit" class="form-control btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div id="projectSearchResults">
            @component('components/ajaxProjectList', ['data' => $data])
            @endcomponent
        </div>
    </div>
    <div class="justify-content-center mt-3">
        <h3>{{ __('users') }}</h3>
{{--        <ul class="list-group">--}}
{{--            @foreach ($data->getUsers() as $user )--}}
{{--                @component('components/projectListItem', ['project' =>$project])--}}
{{--                @endcomponent--}}
{{--            @endforeach--}}
{{--        </ul>--}}
    </div>
@endsection

@section('js-import')
    <script>
        function setupAjax(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function onAjaxResult(result){
            if($('#projectSearchText').val() != result.searchterm){ return; }
            $("#projectSearchResults").empty().html(result.html);

            registerProjectPaginationLinkClick();
        }

        function registerProjectPaginationLinkClick(){
            $('.pagination li a').click(function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                let searchterm = $('#projectSearchText').val();
                $.get(
                    url,
                    {searchterm:searchterm},
                    onAjaxResult
                );
            });
        }

        function registerProjectSearchKeyUp(){
            $('#projectSearchText').keyup(function(){
                let searchterm = $('#projectSearchText').val();
                $.get(
                    "{{ URL::to('searchProject') }}",
                    {searchterm:searchterm},
                    onAjaxResult
                )
            });
        }

        function registerProjectSearchSubmit(){
            $('#projectSearchForm').submit(function(e){
                e.preventDefault();
            });
        }

        function getInitialProjectList(){
            $.get(
                "{{ URL::to('searchProject') }}",
                {searchterm:''},
                onAjaxResult
            )
        }

        $(document).ready(function(){
            setupAjax();

            registerProjectSearchKeyUp();
            registerProjectSearchSubmit();
            registerProjectPaginationLinkClick();

            getInitialProjectList();
        });
    </script>
@endsection
