<div class="column">
  <div class="row">
    <fieldset>
      {!! Form::label($prefix . '_first_name', 'First Name') !!}
      {!! Form::text($prefix . 'Address[first_name]', null, ['id' => $prefix . '_first_name']) !!}
      <span class="error">{!! $errors->first($prefix . 'Address.first_name') !!}</span>
    </fieldset>

    <fieldset>
      {!! Form::label($prefix . '_surname', 'Surname') !!}
      {!! Form::text($prefix . 'Address[surname]', null, ['id' => $prefix . '_surname']) !!}
      <span class="error">{!! $errors->first($prefix . 'Address.surname') !!}</span>
    </fieldset>
  </div>

  <fieldset>
    {!! Form::label($prefix . '_company', 'Company') !!}
    {!! Form::text($prefix . 'Address[company]', null, ['id' => $prefix . '_company']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.company') !!}</span>
  </fieldset>

  <fieldset>
    {!! Form::label($prefix . '_email', 'Email') !!}
    {!! Form::text($prefix . 'Address[email]', null, ['id' => $prefix . '_email']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.email') !!}</span>
  </fieldset>

  <fieldset>
    {!! Form::label($prefix . '_phone', 'Phone') !!}
    {!! Form::text($prefix . 'Address[phone]', null, ['id' => $prefix . '_phone']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.phone') !!}</span>
  </fieldset>
</div>
<div class="column">
  <fieldset>
    {!! Form::label($prefix . '_address1', 'Address Line 1') !!}
    {!! Form::text($prefix . 'Address[address1]', null, ['id' => $prefix . '_address1']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.address1') !!}</span>
  </fieldset>

  <fieldset>
    {!! Form::label($prefix . '_address2', 'Address Line 2') !!}
    {!! Form::text($prefix . 'Address[address2]', null, ['id' => $prefix . '_address2']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.address2') !!}</span>
  </fieldset>

  <div class="row">
    <fieldset>
      {!! Form::label($prefix . '_city_suburb', 'City/Suburb') !!}
      {!! Form::text($prefix . 'Address[city_suburb]', null, ['id' => $prefix . '_city_suburb']) !!}
      <span class="error">{!! $errors->first($prefix . 'Address.city_suburb') !!}</span>
    </fieldset>

    <fieldset>
      {!! Form::label($prefix . '_postcode', 'Postcode') !!}
      {!! Form::text($prefix . 'Address[postcode]', null, ['id' => $prefix . '_postcode']) !!}
      <span class="error">{!! $errors->first($prefix . 'Address.postcode') !!}</span>
    </fieldset>
  </div>

  <fieldset>
    {!! Form::label($prefix . '_state', 'State') !!}
    {!! Form::select($prefix . 'Address[state]', ['' => 'Please select...'] + $states[$prefix . 'Address'], null, ['id' => $prefix . '_state', 'class' => 'state-select']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.state') !!}</span>
  </fieldset>

  <fieldset>
    {!! Form::label($prefix . '_country_iso', 'Country') !!}
    {!! Form::select($prefix . 'Address[country_iso]', $countries, $country[$prefix . 'Address'], ['id' => $prefix . '_country_iso', 'class' => 'country-select', 'data-target' => $prefix . '_state']) !!}
    <span class="error">{!! $errors->first($prefix . 'Address.country_iso') !!}</span>
  </fieldset>
</div>