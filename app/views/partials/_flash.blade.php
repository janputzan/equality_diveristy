@if ( Session::has('message') )
    <div class="alert alert-dismissable alert-success alert-top">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('message') }}
    </div>
@endif

@if ( Session::has('errorMessage') )
    <div class="alert alert-dismissable alert-warning alert-top">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Warning!</h4>
        {{ Session::get('errorMessage') }}
    </div>
@endif