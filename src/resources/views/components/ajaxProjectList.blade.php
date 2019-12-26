<ul class="list-group">
@foreach ($data->getProjectListItemViewModels() as $projectVm)
    @component('components/projectListItem',['projectVM' => $projectVm])
    @endcomponent
@endforeach
</ul>
{{ $data->getProjects()->links() }}
