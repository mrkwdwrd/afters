@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/accordions') !!}" title="Accordions" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to accordions</a>
{!! Form::model($accordion, ['route' => ['admin.accordions.update', $accordion->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit accordion</h2>
        </div>
        {!! Form::submit('Save accordion', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Accordion details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <fieldset class="mb-2 px-1">
                    {!! Form::label('name', 'Accordion Name', ['class' => 'field-label']) !!}
                    {!! Form::text('name', $accordion->name, ['id' => 'name', 'class' => 'field-input']) !!}
                    <span class="field-error">{!! $errors->first('name') !!}</span>
                </fieldset>
                <fieldset class="mb-2 px-1">
                    {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                    {!! Form::text('slug', $accordion->slug, ['id' => 'slug', 'class' => 'field-input']) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </fieldset>
                <fieldset class="mb-6 px-1">
                    {!! Form::label('description', 'Description', ['class' => 'field-label']) !!}
                    {!! Form::textarea('description', $accordion->description, array('id' => 'description', 'class' => 'field-input', 'class' => 'froala_editor', 'placeholder' => 'Accordion description', 'data-url' => '/admin/accordions/'.$accordion->id)) !!}
                </fieldset>
            </div>
        </div>
    </div>

    <div class="section-head">
        <div class="content">
            <h3>Accordion items</h3>
        </div>
        <a data-target="create-record-form" class="button blue flex-shrink-0 create-record">Add item</a>
    </div>
    <div id="accordion-items">
        @foreach ($accordion->items as $item)
            @include("admin.accordions._item")
        @endforeach
    </div>
{!! Form::close() !!}
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => ['admin.accordions.items.create', $accordion->id], 'id' => 'create-record-form', 'data-context' => 'accordion-items', 'class' => 'ajax card modal max-w-2xl']) !!}
    <header class="mb-4 px-1">
        <h3>Create a new accordion item</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
            {!! Form::text('title', '', ['id' => 'title', 'class' => 'field-input', 'placeholder' => 'Title', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('title') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}


@stop

@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
            var result = confirm("Are you sure you want to delete this item?");
            if (result) {
                $.post("/admin/accordions/item_ajax_delete", { id: $(this).data("id") })
                .done(resp => {
                    $(this).parent().parent().parent().remove();
                })
            }
        });

        $(document).on("click", ".sortup", function(e) {
            e.preventDefault();
            var thisitem = $(this).closest(".accordion-item");
            var previtem = thisitem.prev(".accordion-item");
            if (previtem.length > 0) {
                var html = thisitem.clone();
                thisitem.remove();
                previtem.before(html);
            }
            updateItemOrder();
        });

        $(document).on("click", ".sortdown", function(e) {
            e.preventDefault();
            var thisitem = $(this).closest(".accordion-item");
            var nextitem = thisitem.next(".accordion-item");
            if (nextitem.length > 0) {
                var html = thisitem.clone();
                thisitem.remove();
                nextitem.after(html);
            }
            updateItemOrder();
        });

        function updateItemOrder() {
            let order = [];
            $(".accordion-item").each((index, value) => {
                order.push(value.dataset.itemId);
            });
            $.post("/admin/accordions/{{$accordion->id}}/items/sort", {order: order})
            .done(resp => {
                console.log(resp)
            });
        }
    </script>
@stop
