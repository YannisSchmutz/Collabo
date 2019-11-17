<div class="card pb-2" id="pitchbox">
    <img src="{{$picPath}}" class="card-img-top" alt="profile">
    <i class="fas fa-edit ml-auto mr-2 mt-2" onclick="togglePitchForm()"></i>
    <p class="card-text p-2">{{$slot}}</p>
    <button type="button" class="ml-2 mr-2 btn btn-primary">Collab!</button>
</div>
<form action="{{$routeName}}" method="post" class="hiddenForm" id="pitchboxForm">
    @csrf
    <div class="form-group">
        <i class="fas fa-edit float-right" onclick="togglePitchForm()"></i>
        <label for="profilepic">@lang($langFile.'.pic_form')</label>
        <input type="file" class="form-control" id="profilepic" name="profilepic">
    </div>
    <div class="form-group">
        <label for="pitch">@lang($langFile.'.pitch_form')</label>
        <input type="text" class="form-control" id="pitch" value="{{$slot}}" name="pitch">
    </div>
    <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
</form>
<script>
    function togglePitchForm() {
        let pitchDisplay = $('#pitchboxForm').css('display');

        if (pitchDisplay === 'none'){
            $("#pitchbox").fadeOut(10);
            $("#pitchboxForm").fadeIn(500);
        } else {
            $("#pitchboxForm").fadeOut(10);
            $("#pitchbox").fadeIn(500);
        }
    }
</script>
