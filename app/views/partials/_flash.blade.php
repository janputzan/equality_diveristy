@if ( Session::has('message') )
    <div class="message">
        {{ Session::get('message') }}
    </div>
@endif

@if ( Session::has('errorMessage') )
    <div class="message error">
        {{ Session::get('errorMessage') }}
    </div>
@endif