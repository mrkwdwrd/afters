<li>
    <a href="{!! url('admin/pages') !!}" title="Pages">
        <i class="fa fa-lg fa-fw fa-file-o"></i>
        Pages
    </a>
</li>

{{-- <li>
    <a href="{!! url('admin/galleries') !!}" title="Galleris">
        <i class="fa fa-lg fa-fw fa-image"></i>
        Galleries
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/sliders') !!}" title="Sliders">
        <i class="fa fa-lg fa-fw fa-film"></i>
        Sliders
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/accordions') !!}" title="Accordions">
        <i class="fa fa-lg fa-fw fa-list"></i>
        Accordions
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/tiles') !!}" title="Tiles">
        <i class="fa fa-lg fa-fw fa-th-large"></i>
        Tiles
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/people') !!}" title="People">
        <i class="fa fa-lg fa-fw fa-users"></i>
        People
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/blog') !!}" title="Blog">
        <i class="fa fa-lg fa-fw fa-pencil"></i>
        Blog
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/taxonomies') !!}" title="Taxonomies">
        <i class="fa fa-lg fa-fw fa-list-ul"></i>
        Taxonomies
    </a>
</li> --}}

<li>
    <a href="{!! url('admin/media') !!}" title="Media">
        <i class="fa fa-lg fa-fw fa-file-photo-o fa-file-picture-o fa-file-image-o"></i>
        Media
    </a>
</li>

{{-- <li>
    <a href="{!! url('admin/notifications') !!}" title="Notifications">
        <i class="fa fa-lg fa-fw fa-exclamation"></i>
        Notifications
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/coupons') !!}" title="Coupons">
        <i class="fa fa-lg fa-fw fa-ticket"></i>
        Coupons
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/orders') !!}" title="Orders">
        <i class="fa fa-lg fa-fw fa-shopping-basket"></i>
        Orders
    </a>
</li> --}}

<li>
    <a href="{!! url('admin/users') !!}" title="Users">
        <i class="fa fa-lg fa-fw fa-user"></i>
        Users
    </a>
</li>

{{-- <li>
    <a href="{!! url('admin/products') !!}" title="Products">
        <i class="fa fa-lg fa-fw fa-shopping-bag"></i>
        Products
    </a>
</li> --}}
{{--
<li>
    <a href="{!! url('admin/product-lists') !!}" title="Product Lists">
        <i class="fa fa-lg fa-fw fa-sitemap"></i>
        Product Lists
    </a>
</li> --}}

{{-- <li>
    <a href="{!! url('admin/shipping') !!}" title="Shipping">
        <i class="fa fa-lg fa-fw fa-truck"></i>
        Shipping Methods
    </a>
</li> --}}

@if(env('APP_ENV') === 'local')
    <li>
        <a href="{!! url('admin/style') !!}" title="Style Guide">
            <i class="fa fa-lg fa-fw fa-code"></i>
            Style Guide
        </a>
    </li>
@endif
