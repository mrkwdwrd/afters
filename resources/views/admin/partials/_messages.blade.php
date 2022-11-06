@if(Session::has('success'))
<div class="message bg-green-600 text-green-100">
    <p><i class="fa fa-check-circle mr-2"></i>{!! Session::get('success') !!}</p>
</div>
@endif
@if(Session::has('error'))
<div class="message bg-red-600 text-red-100">
    <p><i class="fa fa-times-circle mr-2"></i>{!! Session::get('error') !!}</p>
</div>
@endif
