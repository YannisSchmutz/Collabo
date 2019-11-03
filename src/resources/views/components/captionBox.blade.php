<div>
<div id="captionDiv">
    <i class="fas fa-edit float-right" onclick="toggleVisibility()"></i>
    <h1 class="display-4">{{$title}}</h1>
    <h3 >{{$caption}}</h3>
</div>
<form action="/{{$urlPath}}/editCaption" method="post" class="hiddenForm" id="captionForm">
    @csrf
    <div class="form-group">
        <label for="fullname">@lang($langFile.'.fullname_form')</label>
        <input type="text" class="form-control" id="fullname" value="{{$title}}" name="fullname">
    </div>
    <div class="form-group">
        <label for="caption">@lang($langFile.'.caption_form')</label>
        <input type="text" class="form-control" id="caption" value="{{$caption}}" name="caption">
    </div>
    <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
</form>
</div>
<script>
    function toggleVisibility() {
        $("#captionDiv").fadeOut(10);
        $("#captionForm").fadeIn(500);
    }
</script>
