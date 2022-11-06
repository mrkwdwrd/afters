@if(Session::has('success'))
    <div class="message positive">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

@if(Session::has('error'))
    <div class="message negative">
        <p>{{ Session::get('error') }}</p>
    </div>
@endif