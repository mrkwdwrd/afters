@extends("admin.layouts.master")

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Product Lists</h2>
    </div>
    {!! Form::button('New list', ['id' => 'create-record', 'data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($lists) > 0)
                <ul class="list-hierarchy">
                    @foreach($lists as $list)
                        <li data-id="{!! $list->id !!}">
                            <span>
                                <a href="{!! url('admin/product-lists/' . $list->id . '/edit') !!}" title="Edit product list">{!! $list->title !!}</a>
                                <span class="buttons">
                                    <a href="{!! url('admin/product-lists/' . $list->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit product list"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/product-lists/' . $list->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete product list"><i class="fa fa-trash"></i></a>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="list-empty">There are no product lists to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.product-lists.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new product list</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
            {!! Form::text('title', '', ['id' => 'title', 'class' => 'field-input', 'placeholder' => 'Product list title', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('title') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a id="cancel-create-record" class="button red thin" role='cancel-create-record'>Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.list-hierarchy').sortable({
                cursor: 'move',
                placeholder: 'placeholder',
                forcePlaceholderSize: true,
                stop: function(event, ui) {
                    i = ui.item;
                    s = i.parent();
                    p = s.parent();
                    sortOrder($(this), i, p, s);
                }
            });
        });

        function sortOrder(e, i, p, s) {
            var order = [];
            $(e).children().each(function() {
                order.push($(this).data('id'));
            });

            console.log(order);

            $.ajax({
                type: 'POST',
                url: '/admin/product_lists/sort',
                data: { 'order': order }
            }).done(function(response) {
                console.log(response);
            }).fail(function(response) {
                console.log('ajaxerror', response);
            });

            return false;
        }
    </script>
@stop
