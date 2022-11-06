<section id="{!! $list->slug !!}" class="featured-releases">
    <div class="section-wrapper">
        <div class="title-button">
            <h2>{!! $list->title !!}</h2>
            @if($list->link_url)
            <a href="{!! url($list->link_url) !!}" class="button arrowed" title="{!! $list->title !!}">{!!
                $list->link_text ? $list->link_text : $list->title !!}</a>
            @endif
        </div>
        <div class="releases-grid">
            <div class="releases">
                @foreach($list->products as $product)

                @include('products.partials._product')

                @endforeach
            </div>
        </div>
    </div>
</section>
