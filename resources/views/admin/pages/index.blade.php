@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Pages</h2>
        <div class="text-sm md:text-base">
            <p>Manage Pages.</p>
        </div>
    </div>
    {!! Form::button('New page', ['data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($pages) > 0)
                <ul class="list-hierarchy sortable nested" data-context="pages">
                    {!! View::make('admin.pages.partials._page')->with('pages', $pages) !!}
                </ul>
            @else
                <span class="list-empty">There are no pages to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
    <div id="overlay"></div>
    {!! Form::open(['route' => 'admin.pages.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
        <header class="mb-4 px-1">
            <h3>Create a new page</h3>
        </header>
        <div>
            @if(count($pages) > 0)
                <fieldset class="mb-6 px-1">
                    {!! Form::label('parent_id', 'Parent Page', ['class' => 'field-label']) !!}
                    {!! Form::select('parent_id', ['' => 'None'] + $all_pages->pluck('label', 'id')->all(), null, [ 'id' => 'parent_id', 'class' => 'selectize'] )!!}
                    <span class="field-error">{!! $errors->first('parent_id') !!}</span>
                </fieldset>
            @endif
            <fieldset class="mb-6 px-1">
                {!! Form::label('label', 'Label', ['class' => 'field-label']) !!}
                {!! Form::text('label', '', ['id' => 'label', 'class' => 'field-input', 'placeholder' => 'Page label', 'data-validation' => 'req']) !!}
                <span class="field-error">{!! $errors->first('label') !!}</span>
                <span class="field-tip">This is how the name will appear in your site's navigation.</span>
            </fieldset>
            <fieldset class="px-1">
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
                <a role="cancel-create-record" class="button red thin">Cancel</a>
            </fieldset>
        </div>
    {!! Form::close() !!}

    <style type="text/css">
        ul.list-hierarchy li span.taxon-colour {
            display: inline-block;
            padding: 0;
            width: 1em;
            height: 1em;
            border-radius: 3em;
            text-indent: -999em;
        }

        .ui-sortable-placeholder {
            display: block;
            border: 3px dotted red;
            width: 100%;
            min-height: 40px;
        }
        .sortable.nested {
            padding-bottom: 0.5rem;
        }
        .sortable.nested .sortable.nested > .ui-sortable-placeholder {
            margin-left: 1rem;
        }

        ul.list-hierarchy ul li:first-child {
            margin-top: 0.5rem;
        }
    </style>
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.sortable').sortable({
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
            url: '/admin/pages/sort-order',
            data: { 'order': order }
        }).done(function(response) {
            console.log(response);
        }).fail(function(response) {
            console.log('ajaxerror', response);
        });

        return false;
    }

    $(".create-child").click(function(e) {
        e.preventDefault();
        $("#parent_id")[0].selectize.setValue($(this).data("id"), false);
        $('body').addClass('overlayed');
		$('#overlay').fadeIn(function () {
			$('#create-record-form').fadeIn('fast');
		})
    });
</script>
@stop
