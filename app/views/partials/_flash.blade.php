@if ( Session::has('message') )
    <div class="alert alert-dismissable alert-success alert-top">
        {{ Session::get('message') }}
    </div>
@endif

@if ( Session::has('errorMessage') )
    <div class="alert alert-dismissable alert-warning alert-top">
        <h4>Warning!</h4>
        {{ Session::get('errorMessage') }}
    </div>
@endif