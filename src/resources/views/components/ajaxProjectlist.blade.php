@foreach ($data as $project)
    @component('components/projectListItem', ['project' =>$project])
    @endcomponent
@endforeach
