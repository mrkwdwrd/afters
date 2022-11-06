<nav class="breadcrumbs">
  <ul>
    <li>
      <a href="{!! url($cmsPage->slug) !!}">{!! $cmsPage->label !!}</a>
    </li>
    @if($category->parent)
      @include('categories.partials._parent', ['category' => $category->parent])
    @endif
    <li>
        <a href="{!! url($cmsPage->slug . '/categories/' . $category->slug) !!}">{!! $category->name !!}</a>
    </li>
  </ul>
</nav>