@if(isset($featured))
    @foreach($lists->where('is_featured', $featured) as $list)
        @include('partials._product_list')
    @endforeach
@else
    @foreach($lists as $list)
        @include('partials._product_list')
    @endforeach
@endif





