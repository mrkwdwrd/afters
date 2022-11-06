@extends("admin.layouts.master")
@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Coupons</h2>
        <div class="text-sm md:text-base">
            <p>Manage Coupons</p>
        </div>
    </div>
    {!! Form::button('New coupon', ['id' => 'create-record', 'data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $coupons->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($coupons) > 0)
                <ul class="list-hierarchy">
                @foreach($coupons as $coupon)
                    <li>
                        <span>
                            <a href="{!! url('admin/coupons/' . $coupon->id . '/edit') !!}" title="Edit Coupon">
                                {!! $coupon->code !!}
                                <span class="mx-2">{!! $coupon->summary !!}</span>
                            </a>
                            <span class="buttons">
                                <a href="{!! url('admin/coupons/' . $coupon->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit coupon"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('admin/coupons/' . $coupon->id . '/delete') !!}" class="text-red-500 mr-2" title="Delete coupon"><i class="fa fa-trash"></i></a>
                            </span>
                        </span>
                    </li>
                @endforeach
                </ul>
            @else
                <span class="list-empty">There are no coupons to display.</span>
            @endif
        </div>
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $coupons->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.coupons.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new coupon</h3>
    </header>
    <div class="flex flex-wrap">
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('code', 'Code', ['class' => 'field-label']) !!}
            {!! Form::text('code', '', ['id' => 'code', 'class' => 'field-input', 'placeholder' => 'Code', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('code') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-1/2">
            {!! Form::label('type', 'Type', ['class' => 'field-label']) !!}
            {!! Form::select('type', $couponTypes, null, ['id' => 'type', 'class' => 'field-input']) !!}
            <span class="field-error">{!! $errors->first('type') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-1/2">
            {!! Form::label('discount', 'Discount', ['class' => 'field-label']) !!}
            {!! Form::number('discount', '', ['id' => 'discount', 'class' => 'field-input', 'placeholder' => 'Discount', 'min' => 0, 'step' => 0.01]) !!}
            <span class="field-error">{!! $errors->first('discount') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a id="cancel-create-record" class="button red thin" role="cancel-create-record">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
@stop
