@extends("admin.layouts.master")
@section('content')
<a href="{!! url('admin/taxonomies') !!}" title="Taxonomies" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to taxonomies</a>
{!! Form::model($taxonomy, ['route' => ['admin.taxonomies.update', $taxonomy->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">{{ $taxonomy->name }}</h2>
            <div class="text-sm md:text-base">
                <p>Manage the {{ $taxonomy->name }} taxonomy.</p>
            </div>
        </div>
        <span class="buttons">
            {!! Form::button('New taxon', ['data-target' => 'create-taxon-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
            {!! Form::submit('Save taxonomy', ['class' => 'button blue flex-shrink-0']) !!}
        </span>
    </div>

    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap mb-6">
                    <div class="w-full md:w-1/2 pr-1">
                        <fieldset class="w-full pr-1">
                            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                            {!! Form::text('name', $taxonomy->name, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('name') !!}</span>
                        </fieldset>
                        <fieldset class="w-full pr-1">
                            {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                            {!! Form::text('slug', $taxonomy->slug, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('slug') !!}</span>
                            <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/2 pl-1">
                         <h4 class="border-b border-gray-400 mt-3 mb-3">Applies to</h4>
                        @foreach($taxonomy::TAXONOMY_TYPES as $t => $type)
                            <fieldset class="w-full pr-1">
                                <div class="switch">
                                    <label class="switch-label">
                                        {!! $type !!}
                                        {!! Form::checkbox('type[]', $t, $taxonomy->type ? in_array($t, json_decode($taxonomy->type)) : null , ['class' => 'switch-input']) !!}
                                    </label>
                                </div>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

{!! Form::close() !!}
<div class="w-full mt-8 mb-4 px-2">
    <h3>Taxons</h3>
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($taxonomy->taxons) > 0)
                <ul class="list-hierarchy">
                    @foreach($taxonomy->taxons->where("parent_id", null) as $taxon)
                        <li id="{!! $taxon->id !!}">
                            <span>
                                <a href="{!! url('admin/taxons/' . $taxon->id . '/edit') !!}" title="Edit taxon">
                                    <i class="fa fa-list-ul mr-2"></i>
                                    {!! $taxon->name !!}
                                </a>
                                <span class="buttons">
                                    <a href="{!! url('admin/taxons/'.$taxon->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit taxon"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/taxons/'.$taxon->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete taxon"><i class="fa fa-trash hover:text-red-600"></i></a>
                                    @if($taxon->children->count() > 0)
                                        <a href="#" class="open-close-button" data-taxon="{!! $taxon->id !!}"><i class="fa fa-caret-down"></i></a>
                                    @endif
                                </span>
                            </span>
                        </li>
                        @include("admin.taxonomies.partials.taxons", ["taxons" => $taxon->children])
                    @endforeach
                </ul>
            @else
                <span class="list-empty">There are no taxons to display.</span>
            @endif
        </div>
    </div>
</div>

@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.taxons.create', 'id' => 'create-taxon-form', 'class' => 'card modal max-w-2xl' . (count($errors) && session('form') === 'taxon' ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new taxon</h3>
    </header>
    <div class="flex flex-wrap w-full">
        {!! Form::hidden('taxonomy_id', $taxonomy->id) !!}
        @if($taxonomy->taxons->count() > 0)
            <fieldset class="mb-4 px-1 w-full">
                {!! Form::label('parent_id', 'Parent', ['class' => 'field-label']) !!}
                {!! Form::select('parent_id', $taxonomy->taxons->pluck("name", "id")->all(), null, ['id' => 'parent_id', 'class' => 'selectize', 'placeholder' => 'Optional']) !!}
            </fieldset>
        @else
            {!! Form::hidden("parent_id", null) !!}
        @endif
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
