@extends("admin.layouts.master")

@section('content')
<a href="{!! url('admin/coupons') !!}" title="Coupons" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to coupons</a>
{!! Form::model($coupon, ['route' => ['admin.coupons.update', $coupon->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit coupon</h2>
        </div>
        {!! Form::submit('Save coupon', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Coupon details</h3>
    </div>
    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap w-full md:w-1/2 content-start">
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('code', 'Code', ['class' => 'field-label']) !!}
                            {!! Form::text('code', null, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('code') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full sm:w-1/3 md:w-full lg:w-1/3">
                            {!! Form::label('type', 'Type', ['class' => 'field-label']) !!}
                            {!! Form::select('type', $couponTypes, null, ['id' => 'type', 'class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('type') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2 sm:w-1/3 md:w-1/2 lg:w-1/3">
                            {!! Form::label('discount', 'Discount', ['class' => 'field-label']) !!}
                            {!! Form::number('discount', null, ['id' => 'discount', 'class' => 'field-input', 'placeholder' => 'Discount', 'min' => 0, 'step' => 0.01]) !!}
                            <span class="field-error">{!! $errors->first('discount') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2 sm:w-1/3 md:w-1/2 lg:w-1/3">
                            {!! Form::label('redeem_threshhold', 'Min. Order', ['class' => 'field-label']) !!}
                            {!! Form::number('redeem_threshhold', null, ['class' => 'field-input', 'placeholder' => 'Discount', 'min' => 0, 'step' => 0.01]) !!}
                            <span class="field-error">{!! $errors->first('redeem_threshhold') !!}</span>
                        </fieldset>
                    </div>
                    <div class="flex flex-wrap w-full md:w-1/2 content-start">
                        <fieldset class="mb-6 px-1 w-full md:w-1/2">
                            {!! Form::label('valid_from', 'Valid From', ['class' => 'field-label']) !!}
                            {!! Form::text('valid_from', null, ['class' => 'field-input flatpickr', 'data-alt-format' => 'l F J, Y']) !!}
                            <span class="field-error">{!! $errors->first('valid_from') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full md:w-1/2">
                            {!! Form::label('valid_to', 'Valid To', ['class' => 'field-label']) !!}
                            {!! Form::text('valid_to', null, ['class' => 'field-input flatpickr', 'data-alt-format' => 'l F J, Y']) !!}
                            <span class="field-error">{!! $errors->first('valid_to') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full lg:w-1/2">
                            {!! Form::label('redeem_limit', 'Redemption Limit', ['class' => 'field-label']) !!}
                            {!! Form::number('redeem_limit', null, ['class' => 'field-input', 'min' => 0, 'step' => 1]) !!}
                            <span class="field-tip">The total number of times this coupon can be redeemed. Leave empty for no limit.</span>
                            <span class="field-error">{!! $errors->first('redeem_limit') !!}</span>
                        </fieldset>
                        <fieldset class="w-full lg:w-1/2 lg:mt-8 pr-1">
                            <div class="switch">
                                <label class="switch-label">
                                    Limit to specified users
                                    {!! Form::checkbox('limit_to_users', true, null, ['class' => 'switch-input']) !!}
                                </label>
                            </div>
                            <span class="field-tip">Coupon can only be redeemed by specified users.</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($coupon->limit_to_users)
        <div class="w-full mt-8 mb-4 px-2">
            <h3>Coupon details</h3>
        </div>
        <div class="card-group mb-5">
            <div class="card-col w-full">
                <div class="card">
                    <div class="flex">
                        <fieldset class="w-full pr-4">
                            {!! Form::select('select_users[]', $users->pluck('email', 'id'), [], ['class' => 'selectize search', 'multiple', 'placeholder' => 'Select users by email address']) !!}
                        </fieldset>
                        {!! Form::submit('Add users', ['class' => 'button green flex-shrink-0']) !!}
                    </div>
                </div>
            </div>
        </div>
        @if($coupon->users)
            <div class="card-group mb-5">
                <div class="card-col w-full">
                    <div class="card ">
                        @if(count($coupon->users))
                            <ul class="list-hierarchy w-full">
                                @foreach($coupon->users as $user)
                                <li>
                                    <span>
                                        <a href="{!! url('admin/users/' . $user->id . '/edit') !!}">{!! $user->name !!} ({!! $user->email !!})</a>
                                        <span>
                                            {!! $user->pivot->redeemed_at ? 'Redeemed: ' . Carbon\Carbon::create($user->pivot->redeemed_at)->format('d/m/Y H:i:s') : 'Not Redeemed' !!}
                                            <a href="{!! url('admin/coupons/' . $coupon->id . '/users/' . $user->id . '/delete') !!}" class="text-red-500 delete-confirm ml-4" title="Remove user from this coupon"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <span class="list-empty">There are no users to display.</span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endif
{!! Form::close() !!}
@stop

@section('scripts')
@stop
