@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/shipping/items/' . $shippingItem->id . '/edit') !!}" title="{!! $shippingItem->name !!}" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to {!! $shippingItem->name !!}</a>
{!! Form::open(['route' => ['admin.shipping.items.updateCharges', $shippingItem->id, $shippingMethod->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit {!! $shippingMethod->name !!} charges</h2>
        </div>
        <span>
            {!! Form::submit('Save charges', ['class' => 'button blue flex-shrink-0']) !!}
        </span>
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-2/3 lg:pr-4">
                        <h4 class="mb-4">Shipping Charges</h4>
                        <table class="mb-6">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Base Charge</th>
                                    <th>Additional Item</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="shipping-charges">
                                @if (count($shippingCharges) > 0)
                                @foreach($shippingCharges as $charge)
                                    @if($charge->country_iso)
                                    <tr>
                                        <td>
                                            {!! $charge->country->getName() !!} ({!! $charge->country_iso !!})
                                            {!! Form::hidden('charges[' . $charge->country_iso . '][country_iso]', $charge->country_iso) !!}
                                        </td>
                                        <td>{!! Form::number('charges[' . $charge->country_iso . '][base_charge]', $charge->base_charge, ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
                                        <td>{!! Form::number('charges[' . $charge->country_iso . '][item_charge]', $charge->item_charge, ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
                                        <td class="text-right"><a href="#" class="button red remove-charge py-1 px-2"><i class="fa fa-minus-circle"></i></a></td>
                                    </tr>
                                    @endif
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr class="{!! $restOfWorld ? '' : 'disabled' !!}">
                                    <td>
                                        Rest of World
                                    </td>
                                    <td>{!! Form::number('rest_of_world[base_charge]', $restOfWorld ? $restOfWorld->base_charge : '', ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
                                    <td>{!! Form::number('rest_of_world[item_charge]', $restOfWorld ? $restOfWorld->item_charge : '', ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
                                    <td>
                                        <div class="switch -mt-8">
                                            <label class="switch-label">
                                                {!! Form::checkbox('enable_rest_of_world', true, $restOfWorld, ['class' => 'switch-input']) !!}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="w-full lg:w-1/3">
                        <h4 class="mb-4">Available Countries</h4>
                        <ul class="list-hierarchy">
                            @foreach($unsetCountries as $iso => $country)
                            <li>
                                <span class="flex">
                                    <span>{!! $country !!} ({!! $iso !!})</span>
                                    <span class="buttons">
                                        <a href="#" class="button green add-charge py-1 px-2" data-country="{!! $country !!}" data-iso="{!! $iso !!}"><i class="fa fa-plus-circle"></i></a>
                                    </span>
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('templates')
    <script type="html/template" id="charge-template">
        <tr>
            <td>
                {country} ({iso})
                {!! Form::hidden('charges[{iso}][country_iso]', '{iso}') !!}
            </td>
            <td>{!! Form::number('charges[{iso}][base_charge]', '0.00', ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
            <td>{!! Form::number('charges[{iso}][item_charge]', '0.00', ['class' => 'm-1 p-1 border border-gray-600', 'step' => 'any']) !!}</td>
            <td class="text-right"><a href="#" class="button red remove-charge py-1 px-2"><i class="fa fa-minus-circle"></i></a></td>
        </tr>
    </script>
@endsection

@section('scripts')
    <style>
        tr.disabled td input[type=number] {
            opacity: 0.25;
        }
    </style>
    <script type="text/javascript">
        $(document).on('click', 'a.add-charge', function () {
            var template = $('#charge-template').html()
            .replace(/{iso}/g, $(this).data('iso'))
            .replace(/{country}/g, $(this).data('country'));
            $(template).prependTo($('#shipping-charges'));
            $(this).closest('li').remove();
        });
        $(document).on('click', 'a.remove-charge', function () {
            $(this).closest('tr').remove();
        });
        $(document).on('change', 'input[name=enable_rest_of_world]', function (e) {
            $('input[name^=rest_of_world]').each(function () {
                this.disabled = !e.target.checked
                this.value = e.target.checked ? '0.00' : null
            });
            if (e.target.checked) {
                $(this).closest('tr').removeClass('disabled');
            } else {
                $(this).closest('tr').addClass('disabled');
            }
        });
    </script>
@stop
