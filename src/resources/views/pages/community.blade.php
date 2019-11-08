@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <h3>{{ __('projects') }}</h3>
        <form method="POST" action="{{ URL::to('searchProject') }}" id="projectSearchForm" class="row mb-2 searchForm">
            {{ csrf_field() }}
            <div class="col-6 input-group">
                <input type="text" class="form-control inputSearchText" id="projectSearchText" name="projectSearchText" placeholder="{{ __('communitytext.project_search') }}">
                <div class="input-group-btn">
                    <button type="submit" class="form-control btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="searchResults" id="projectSearchResult">
            @component('components/ajaxProjectList', ['data' => $data])
            @endcomponent
        </div>
    </div>
    <div class="justify-content-center mt-3">
        <h3>{{ __('users') }}</h3>
        <form method="POST" action="{{ URL::to('searchProfile') }}" id="profileSearchForm" class="row mb-2 searchForm">
            {{ csrf_field() }}
            <div class="col-6 input-group">
                <input type="text" class="form-control inputSearchText" id="profileSearchText" name="profileSearchText" placeholder="{{ __('communitytext.profile_search') }}">
                <div class="input-group-btn">
                    <button type="submit" class="form-control btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="searchResults" id="profileSearchResult">
            @component('components/ajaxProfileList', ['data' => $data])
            @endcomponent
        </div>
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
            $('#projectSearchForm').attr('action', '{{ URL::to('searchProject') }}');
            $('#profileSearchForm').attr('action', '{{ URL::to('searchProfile') }}');
        }

        function onAjaxResult(result){
            if($('#' + result.resultElementId).parent().find('.inputSearchText').val() != result.searchterm){ return; }
            $('#' + result.resultElementId).empty().html(result.html);

            registerPaginationLinkClick(result.resultElementId);
        }

        function registerPaginationLinkClick(resultElementId){
            $('#' + resultElementId +' .pagination li a').click(function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                let searchterm = $(this).closest('.searchResults').parent().find('.inputSearchText').val();
                let resultElementId = $(this).closest('.searchResults').attr('id');
                $.get(
                    url,
                    {
                        searchterm:searchterm,
                        resultElementId:resultElementId
                    },
                    onAjaxResult
                );
            });
        }

        function registerSearchKeyUp(){
            $('.inputSearchText').keyup(function(){
                let searchterm = $(this).val();
                let url = $(this).closest('form').attr('action');
                let resultElementId = $(this).closest('form').parent().find('.searchResults').attr('id');
                $.get(
                    url,
                    {
                        searchterm:searchterm,
                        resultElementId:resultElementId
                    },
                    onAjaxResult
                )
            });
        }

        function registerSearchSubmit(){
            $('.searchForm').submit(function(e){
                e.preventDefault();
            });
        }

        function getInitialProjectList(){
            $.get(
                '{{ URL::to('searchProject') }}',
                {
                    searchterm:'',
                    resultElementId:'projectSearchResult'
                },
                onAjaxResult
            )
        }

        function getInitialProfileList(){
            $.get(
                '{{ URL::to('searchProfile') }}',
                {
                    searchterm:'',
                    resultElementId:'profileSearchResult'
                },
                onAjaxResult
            )
        }

        $(document).ready(function(){
            setupAjax();

            registerSearchKeyUp();
            registerSearchSubmit();

            getInitialProjectList();
            getInitialProfileList();
        });
    </script>
@endsection
