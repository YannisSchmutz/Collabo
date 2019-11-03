<ul class="list-group">
@foreach ($data->getProjects() as $project)
    @component('components/projectListItem', ['project' =>$project])
    @endcomponent
@endforeach
</ul>
{{ $data->getProjects()->links() }}
