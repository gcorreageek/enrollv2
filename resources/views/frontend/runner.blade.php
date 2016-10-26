@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")
@inject("countries", "App\Http\Utilities\Country")
@inject("states", "App\Http\Utilities\State")
@inject("provinces", "App\Http\Utilities\Province")
@inject("cities", "App\Http\Utilities\City")
@inject("bloods", "App\Http\Utilities\Blood")

@section("content")


    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
        <h2 class="text-center">{{ $engine->event->name }} {{ $engine->event->date->year }}</h2>
    </div>


    <div class="col-lg-6 col-lg-offset-3">

        {!! Form::model($runner, ['url' => $event->prefix . '/' . $engine->id . '/persist_runner']) !!}

        @if($pay == 'code' && $code->track_id > 0)
            <h2>{{ $code->track->name }}</h2>
            {!! Form::hidden('track', $code->track->id, ['class' => 'form-control']) !!}
        @else
            <div class="form-group">
                {!! Form::label('track', 'Distancia:', ['class' => 'sr-only']) !!}
                {!! Form::select('track', $safeTracks->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una distancia']) !!}
            </div>
        @endif


        <div class="form-group">
            {!! Form::label('name_last', 'Apellidos:', ['class' => 'sr-only']) !!}
            {!! Form::text('name_last', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name_first', 'Nombres:', ['class' => 'sr-only']) !!}
            {!! Form::text('name_first', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-xs-6 gender_container">
                    {!! Form::label('verbose_gender', 'Género:', ['class' => 'sr-only']) !!}
                    {!! Form::text('verbose_gender', \App\Runner::verboseGender($gender), ['class' => 'form-control', 'placeholder' => 'Género', 'disabled']) !!}
                    {!! Form::hidden('gender', $gender, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-xs-6 dob_container">
                    {!! Form::label('dob_dummy', 'Fecha de nacimiento:', ['class' => 'sr-only']) !!}
                    {!! Form::text('dob_dummy', $dob->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'Fecha de nacimiento', 'disabled']) !!}
                    {!! Form::hidden('dob', $dob->format('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-xs-6 doc_type_container">
                    {!! Form::label('doc_type_dummy', 'Tipo documento:', ['class' => 'sr-only']) !!}
                    {!! Form::text('doc_type_dummy', $doc_type, ['class' => 'form-control', 'placeholder' => 'Tipo documento', 'disabled']) !!}
                    {!! Form::hidden('doc_type', $doc_type, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-xs-6 doc_num_container">
                    {!! Form::label('doc_num_dummy', 'Número documento:', ['class' => 'sr-only']) !!}
                    {!! Form::text('doc_num_dummy', strtoupper($doc_num), ['class' => 'form-control', 'placeholder' => 'Número documento', 'disabled']) !!}
                    {!! Form::hidden('doc_num', $doc_num, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mail', 'Correo electrónico:', ['class' => 'sr-only']) !!}
            {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mail_confirmation', 'Confirmación correo electrónico:', ['class' => 'sr-only']) !!}
            {!! Form::text('mail_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Reingrese correo electrónico']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telephone', 'Teléfono:', ['class' => 'sr-only']) !!}
            {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Celular:', ['class' => 'sr-only']) !!}
            {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Celular']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country', 'País:', ['class' => 'sr-only']) !!}
            {!! Form::select('country', $countries::all(), $defaultCountry, ['class' => 'form-control', 'placeholder' => 'Seleccione su país']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado / Departamento:', ['class' => 'sr-only']) !!}
            {!! Form::select('state', $states::all(), $defaultState, ['class' => 'form-control', 'placeholder' => 'Seleccione su estado / departamento']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('province', 'Provincia:', ['class' => 'sr-only']) !!}
            {!! Form::select('province', $provinces::all(), $defaultProvince, ['class' => 'form-control', 'placeholder' => 'Seleccione su provincia']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Ciudad / Distrito:', ['class' => 'sr-only']) !!}
            {!! Form::select('city', $cities::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su ciudad / distrito']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('blood', 'Grupo sanguíneo:', ['class' => 'sr-only']) !!}
            {!! Form::select('blood', $bloods::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su grupo sanguíneo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('allergies', 'Alergias:', ['class' => 'sr-only']) !!}
            {!! Form::textarea('allergies', null, ['class' => 'form-control', 'placeholder' => 'Alergias']) !!}
        </div>


        @if(is_null($runner))
            {!! Form::hidden('runner_id', 0, ['class' => 'form-control']) !!}
        @else
            {!! Form::hidden('runner_id', $runner->id, ['class' => 'form-control']) !!}
        @endif
        {!! Form::hidden('pay', $pay, ['class' => 'form-control']) !!}
        {!! Form::hidden('code_id', $code->id, ['class' => 'form-control']) !!}
        {!! Form::hidden('code', old('code'), ['class' => 'form-control']) !!}
        {!! Form::hidden('gateway', $gateway->id, ['class' => 'form-control']) !!}
        {!! Form::hidden('form', 'runner', ['class' => 'form-control']) !!}

        <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
        {{--<div class="form-group">{!! Form::button('Regresar', ['class' => 'form-control btn btn-danger event_cancel_button']) !!}</div>--}}

        {!! Form::close() !!}

    </div>

@endsection


@section("script")
    <script>
        var country = '{{ $defaultCountry }}}';
        var state = '{{ $defaultState }}}';
        var province = '{{ $defaultProvince }}}';

        if($('#province').val() != 'LIM'){
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }

        if($('#state').val() != 'LIM'){
            $('#province').prop("selectedIndex", 0);
            $('#province').prop('disabled', true);
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }

        if($('#country').val() != 'pe'){
            $('#state').prop("selectedIndex", 0);
            $('#state').prop('disabled', true);
            $('#province').prop("selectedIndex", 0);
            $('#province').prop('disabled', true);
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }


        $('#country').change(function(){
            if($('#country').val() != 'pe'){
                $('#state').prop('disabled', true);
                $('#state').prop("selectedIndex", 0);
                $('#province').prop('disabled', true);
                $('#province').prop("selectedIndex", 0);
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#state').prop('disabled', false);
            }
        });

        $('#state').change(function(){
            if($('#state').val() != 'LIM'){
                $('#province').prop('disabled', true);
                $('#province').prop("selectedIndex", 0);
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#province').prop('disabled', false);
            }
        });

        $('#province').change(function(){
            if($('#province').val() != 'LIM'){
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#city').prop('disabled', false);
            }
        });
    </script>
@endsection