<div class="card pb-2" id="pitchbox">
    <img src="{{$picPath}}" class="card-img-top" alt="profile">
    <i class="fas fa-edit ml-auto mr-2 mt-2" onclick="togglePitchForm()"></i>
    <p class="card-text p-2">{{$slot}}</p>
    <button type="button" class="ml-2 mr-2 btn btn-primary">Collab!</button>
</div>
<form action="/profile/editPitchbox" method="post" class="hiddenForm" id="pitchboxForm">
    @csrf
    <div class="form-group">
        <label for="profilepic">@lang('profiletext.pic_form')</label>
        <input type="file" class="form-control" id="profilepic">
    </div>
    <div class="form-group">
        <label for="caption">@lang('profiletext.pitch_form')</label>
        <input type="text" class="form-control" id="caption" value="{{$slot}}">
    </div>
    <button type="submit" class="btn btn-primary">@lang('profiletext.submit')</button>
</form>
<script>
    function togglePitchForm() {
        $("#pitchbox").fadeOut(10);
        $("#pitchboxForm").fadeIn(500);
    }
</script>
