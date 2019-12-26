<ul class="list-group">
@foreach ($data->getProfiles() as $profile)
    @component('components/profileListItem', ['profile' =>$profile])
    @endcomponent
@endforeach
</ul>
{{ $data->getProfiles()->links() }}
