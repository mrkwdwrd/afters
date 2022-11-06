<div class='flex mb-2 item'>
    {!! Form::select('product_specification['.$t.']['.$s.'][specification_id]',
        $specifications->pluck('label', 'id')->all(),
        isset($specification) ? $specification->id : null,
        [
            'class' => 'selectize sort-index create flex-auto mr-2 w-1/2',
            'placeholder' => 'Select specification',
            'data-create-url' => url('admin/products/specifications/create')
        ]
    ) !!}
    {!! Form::text('product_specification['.$t.']['.$s.'][value]', isset($specification) ? $specification->value : null, ['class' => 'field-input mr-2 w-1/2', 'placeholder' => 'Description']) !!}
    <a class="button red thin" role="remove-spec"><i class="fa fa-times"></i></a>
</div>
