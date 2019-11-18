<div class="container" id="messages">
    @isset($successMessage)
        <div class="alert alert-success" role="alert">
            {{$successMessage}}
        </div>
    @endisset
    @isset($errorMessage)
        <div class="alert alert-danger" role="alert">
            {{$errorMessage}}
        </div>
    @endisset
    @isset($warningMessage)
        <div class="alert alert-warning" role="alert">
            {{$warningMessage}}
        </div>
    @endisset
    @isset($infoMessage)
        <div class="alert alert-info" role="alert">
            {{$infoMessage}}
        </div>
    @endisset
</div>
