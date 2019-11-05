<div class="card mt-4 mb-4 p-2">
    <h3 class="card-title">{{$slot}}</h3>
    <div class="card-body">
        <form action="/{{$urlPath}}/removeInterest" method="post" id="removeInterestForm">
            @csrf
            @foreach ($interestsToDisplay as $interest)
                <span class="badge badge-info">
                    {{$interest['name']}}
                    <i class="fas fa-trash float-right ml-2" onclick="prepareRemoveSubmit(this);"></i>
                    <input type="hidden" id="interestToRemoveIdHolder" value="{{$interest['id']}}">
                </span>
            @endforeach
            <input type="hidden" name="interest_id_to_remove" id="interestToRemoveInputIdHidden">
        </form>
    </div>

    <form action="/{{$urlPath}}/addInterest" method="post" id="addInterestForm" onsubmit="return validateAddInterest();">
        @csrf
        <div class="input-group mb-3">
            <input name="interest_to_add" id="interest_to_add" type="text" list="interests" class="form-control" placeholder="@lang($langFile.'.interests_placeholder')" aria-describedby="basic-addon2"/>
            <datalist id="interests">
                @foreach ($possibleInterestsToAdd as $selectableInterest)
                    <option data-value={{$selectableInterest['id']}} value={{$selectableInterest['name']}}>
                @endforeach
            </datalist>
            <input type="hidden" name="interest_id_to_add" id="interestToAddInputIdHidden">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary">@lang('general.add')</button>
            </div>
        </div>
    </form>
</div>

<script>

    function prepareRemoveSubmit(caller) {
        let selectedInterestId = $(caller).parent().find('#interestToRemoveIdHolder').val();
        let inputTagToSubmit = $('#interestToRemoveInputIdHidden');
        inputTagToSubmit.val(selectedInterestId);
        $('#removeInterestForm').submit();
    }

    function validateAddInterest(){
        let selectedInterest = $('#interest_to_add').val();
        let optionObject = $("#interests").find("option[value='" + selectedInterest + "']");

        if(optionObject != null && optionObject.length > 0){
            //hiddenInput.value = option.getAttribute('data-value');
            $('#interestToAddInputIdHidden').val(
                $("#interests").find("option[value='" + selectedInterest + "']").attr('data-value')
            );
            return true;
        } else {
            // TODO: Find a proper was to display FE-validation errors!
            alert("Given interest is not yet supported. TODO: Change me!"); // don't allow form submission
            return false;
        }
    }

</script>
