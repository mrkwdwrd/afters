@extends("admin.layouts.master")
@section('content')
<div class="section-head">
    <div class="content">
        <h2>Taxonomies</h2>
        <div class="text-sm md:text-base">
            <p>Manage Taxonomies and Taxons</p>
        </div>
    </div>
    <span>
    {!! Form::button('New taxonomy', ['data-target' => 'create-taxonomy-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
    @if (count($taxonomies) > 0)
        {!! Form::button('New taxon', ['data-target' => 'create-taxon-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
    @else
        {!! Form::button('New taxon', ['data-target' => 'create-taxon-form', 'class' => 'button bg-gray-500 text-gray-200 italic flex-shrink-0 create-record', 'disabled' => true]) !!}
    @endif
    </span>
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($taxonomies) > 0)
                <ul class="list-hierarchy">
                    @foreach($taxonomies as $taxonomy)
                        <li>
                            <span>
                                <a href="{!! url('admin/taxonomies/'.$taxonomy->id.'/edit') !!}" title="Edit taxonomy">
                                    <i class="fa fa-list-ul mr-2"></i>
                                    {{ $taxonomy->name }}
                                </a>
                                <span class="buttons">
                                    <a href="{!! url('admin/taxonomies/'.$taxonomy->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit taxonomy"><i class="fa fa-edit"></i></a>
                                    {{-- <a href="#" class="text-blue-500 create-child mr-2" title="Create child page" data-id="{{$taxonomy->id}}"><i class="fa fa-plus-circle"></i></a> --}}
                                    <a href="#" class="open-close-button" data-taxonomy="{{$taxonomy->id}}"><i class="fa fa-caret-down"></i></a>
                                </span>
                            </span>
                        </li>
                        @include("admin.taxonomies.partials.taxons", ["taxons" => $taxonomy->taxons->where("parent_id", null)])
                    @endforeach
                </ul>
            @else
                <span class="list-empty">There are no taxonomies to display.</span>
            @endif
        </div>
    </div>
</div>
@stop
@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.taxonomies.create', 'id' => 'create-taxonomy-form', 'class' => 'card modal max-w-2xl' . (count($errors) && session('form') === 'taxonomy' ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new taxonomy</h3>
    </header>
    <div class="flex flex-wrap w-full">
        <fieldset class="mb-4 px-1 w-full">
            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
            {!! Form::text('name', null, ['id' => 'name', 'class' => 'field-input', 'data-validation' => 'req']) !!}
            @if(session('form') === 'taxonomy')
                <span class="field-error">{!! $errors->first('name') !!}</span>
            @endif
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
{!! Form::open(['route' => 'admin.taxons.create', 'id' => 'create-taxon-form', 'class' => 'card modal max-w-2xl' . (count($errors) && session('form') === 'taxon' ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new taxon</h3>
    </header>
    <div class="flex flex-wrap w-full">
        <fieldset class="mb-4 px-1 w-full">
            {!! Form::label('taxonomy_id', 'Taxonomy', ['class' => 'field-label']) !!}
            {!! Form::select('taxonomy_id', ["" => "Select..."] + $taxonomies->pluck("name", "id")->all(), null, ['id' => 'taxonomy_id', 'class' => 'selectize', 'data-validation' => 'req']) !!}
            @if(session('form') === 'taxon')
                <span class="field-error">{!! $errors->first('taxonomy_id') !!}</span>
            @endif
        </fieldset>
        @if($taxonomies->pluck("taxons")->flatten()->count() > 0)
            <fieldset class="mb-4 px-1 w-full">
                {!! Form::label('parent_id', 'Taxon Parent', ['class' => 'field-label']) !!}
                {!! Form::select('parent_id', $taxonomies->pluck("taxons")->flatten()->pluck("name", "id")->all(), null, ['id' => 'parent_id', 'class' => 'selectize', 'placeholder' => 'Optional']) !!}
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
