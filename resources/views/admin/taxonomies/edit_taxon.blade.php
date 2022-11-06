@extends("admin.layouts.master")
@section('content')
<a href="{!! url('admin/taxonomies') !!}" title="Taxonomies" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to taxonomies</a>
{!! Form::model($taxon, ['route' => ['admin.taxons.update', $taxon->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="leading-none"><a href="{{ url('/admin/taxonomies/' . $taxon->taxonomy->id . '/edit') }}" class="text-gray-600 hover:text-gray-800">{{ $taxon->taxonomy->name }}</a> <i class="fa fa-angle-right mx-2"></i>{{ $taxon->name }}</h2>
        </div>
        <span class="buttons">
            {!! Form::button('Create child', ['data-target' => 'create-taxon-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
            {!! Form::submit('Save taxon', ['class' => 'button blue flex-shrink-0']) !!}
        </span>
    </div>

    <div class="card-group">
        <div class="card-col w-full md:w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <fieldset class="mb-6 px-1 w-1/2">
                        {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                        {!! Form::text('name', $taxon->name, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('name') !!}</span>
                    </fieldset>
                    <fieldset class="mb-6 px-1 w-1/2">
                        {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                        {!! Form::text('slug', $taxon->slug, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('slug') !!}</span>
                        <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
                    </fieldset>
                    {{-- <fieldset class="mb-6 px-1 w-full">
                        {!! Form::label('permalink', 'Permalink', ['class' => 'field-label']) !!}
                        {!! Form::text('permalink', $taxon->permalink, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('permalink') !!}</span>
                        <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
                    </fieldset> --}}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@if($taxon->children->count())
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Children</h3>
    </div>

    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <ul class="list-hierarchy">
                    @foreach($taxon->children as $child)
                        <li id="{!! $child->id !!}">
                            <span>
                                <a href="{!! url('admin/taxons/' . $child->id . '/edit') !!}" title="Edit taxon">
                                    <i class="fa fa-list-ul mr-2"></i>
                                    {!! $child->name !!}
                                </a>
                                <span class="buttons">
                                    <a href="{!! url('admin/taxons/'.$child->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit taxon"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/taxons/'.$child->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete taxon"><i class="fa fa-trash hover:text-red-600"></i></a>
                                    @if($child->children->count() > 0)
                                        <a href="#" class="open-close-button" data-taxon="{!! $child->id !!}"><i class="fa fa-caret-down"></i></a>
                                    @endif
                                </span>
                            </span>
                        </li>
                        @include("admin.taxonomies.partials.taxons", ["taxons" => $child->children])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.taxons.create', 'id' => 'create-taxon-form', 'class' => 'card modal max-w-2xl' . (count($errors) && session('form') === 'taxon' ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create child taxon</h3>
    </header>
    <div class="flex flex-wrap w-full">
        {!! Form::hidden('taxonomy_id', $taxon->taxonomy_id) !!}
        {!! Form::hidden('parent_id', $taxon->id) !!}
        <fieldset class="mb-4 px-1 w-full">
            {!! Form::label('taxon_name', 'Name', ['class' => 'field-label']) !!}
            {!! Form::text('taxon_name', null, ['id' => 'taxon_name', 'class' => 'field-input', 'data-validation' => 'req']) !!}
            @if(session('form') === 'taxon')
                <span class="field-error">{!! $errors->first('taxon_name') !!}</span>
            @endif
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
<script>
    $(".open-close-button").on("click", function(e) {
        e.preventDefault();
        if ($(this).data("taxonomy") !== undefined)
            var children = $("ul").find("[data-taxonomy='" + $(this).data("taxonomy") + "'][data-parent='']");
        else if ($(this).data("taxon") !== undefined)
            var children = $("ul").find("[data-parent='" + $(this).data("taxon") + "']");

        if ($(this).hasClass('active')) {
            $(this).removeClass('active').find('i').removeClass('fa-caret-up').addClass('fa-caret-down');
            children.hide();
        } else {
            $(this).addClass('active').find('i').addClass('fa-caret-up').removeClass('fa-caret-down');
            children.show();
        }
    });
</script>
@stop
