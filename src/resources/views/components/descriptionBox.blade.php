<div>
    <div id="descriptionDiv">

        <div class="card p-2">
            <div>
                <i class="fas fa-edit float-right" onclick="toggleDescriptionForm()"></i>
            </div>
            <h3 class="card-title">{{$slot}}</h3>
            <p class="card-text">{{$text}}</p>
        </div>

    </div>

    <form action="/{{$urlPath}}/editDescriptionBox" method="post" class="hiddenForm" id="descriptionForm">
        @csrf
        <div class="card p-2 form-group">
            <div>
                <i class="fas fa-edit float-right" onclick="toggleDescriptionForm()"></i>
            </div>
            <h3 class="card-title">{{$slot}}</h3>
            <textarea class="form-control" id="descriptionArea" name="descriptionArea">{{$text}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">@lang('general.submit')</button>

    </form>
</div>


<script>
    function toggleDescriptionForm() {
        let descriptionDisplay = $('#descriptionForm').css('display');
        console.log(descriptionDisplay);

        if (descriptionDisplay === 'none'){
            $("#descriptionDiv").fadeOut(10);
            $("#descriptionForm").fadeIn(500);
        } else {
            $("#descriptionForm").fadeOut(10);
            $("#descriptionDiv").fadeIn(500);
        }
    }
</script>
