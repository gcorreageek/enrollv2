@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")

@section("content")


    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
        <h2 class="text-center">{{ $engine->event->name }} {{ $engine->event->date->year }}</h2>
    </div>


    <div class="col-lg-6 col-lg-offset-3">

        {!! Form::open(['url' => $event->prefix . '/' . $engine->id . '/check']) !!}

        <div class="form-group">
            {!! Form::label('doc_type', 'Tipo de Documento:', ['class' => 'sr-only']) !!}
            {!! Form::select('doc_type', $documents::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de documento']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('doc_num', 'Número de Documento:', ['class' => 'sr-only']) !!}
            {!! Form::text('doc_num', null, ['class' => 'form-control', 'placeholder' => 'Número de documento']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Género:', ['class' => 'sr-only']) !!}
            {!! Form::select('gender', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Género']) !!}
        </div>


        <p class="form-control-static">Fecha de nacimiento</p>
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-xs-4 dob_day_selector_container">
                    {!! Form::label('dob_day', 'Día:', ['class' => 'sr-only']) !!}
                    {!! Form::selectRange('dob_day', 1, 31, null, ['class' => 'form-control dob_component dob_day', 'placeholder' => 'Día'])!!}
                </div>

                <div class="form-group col-xs-4 dob_month_selector_container">
                    {!! Form::label('dob_month', 'Mes:', ['class' => 'sr-only']) !!}
                    {!! Form::selectRange('dob_month', 1, 12, null, ['class' => 'form-control dob_component dob_month', 'placeholder' => 'Mes'])!!}
                </div>

                <div class="form-group col-xs-4 dob_year_selector_container">
                    {!! Form::label('dob_year', 'Año:', ['class' => 'sr-only']) !!}
                    {!! Form::selectRange('dob_year', $engine->closestYear(), $engine->fartherYear(), null, ['class' => 'form-control dob_component dob_year', 'placeholder' => 'Año']) !!}
                </div>
            </div>
        </div>
        {!! Form::hidden('dob', null, ['class' => 'form-control dob']) !!}


        <p class="form-control-static">Medio de pago</p>

        @if($engine->codes_enabled == true)
            @if($engine->gateways()->count() > 0)
                <div class="gateway_radio">
                    <label>
                        {!! Form::radio('pay', 'code', null) !!} Código de Inscripción
                    </label>
                </div>
            @else
                {!! Form::hidden('pay', 'code', ['class' => 'form-control']) !!}
            @endif
            <div class="form-group">
                {!! Form::label('code', 'Código de Inscripción :', ['class' => 'sr-only']) !!}
                {!! Form::text('code', null, ['class' => 'form-control code', 'placeholder' => 'Ingrese un código']) !!}
            </div>
        @endif

        @if($engine->gateways()->count() > 0)
            @if($engine->codes_enabled == true)
                <div class="gateway_radio">
                    <label>
                        {!! Form::radio('pay', 'gateway', null) !!} Pago Electrónico
                    </label>
                </div>
            @else
                {!! Form::hidden('pay', 'gateway', ['class' => 'form-control']) !!}
            @endif
            <div class="form-group">
                {!! Form::label('gateway', 'Pago Electrónico :', ['class' => 'sr-only']) !!}
                {!! Form::select('gateway', $engine->gateways->pluck('name', 'id'), null, ['class' => 'form-control code', 'placeholder' => 'Seleccione un medio de pago']) !!}
            </div>
        @endif

        <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
        @if($engine->event->engines()->count() > 1)
            <div class="form-group">{!! Form::button('Regresar', ['class' => 'form-control btn btn-danger gateway_cancel_button']) !!}</div>
        @endif

        {!! Form::close() !!}

    </div>

@endsection


@section("script")
    <script>

        if ( $('input[type=radio][name=pay]').length ) {
            $('#gateway').prop("selectedIndex", 0).prop("disabled", true);
            $('#code').val('').prop("disabled", true);
        }

        $('.dob_component').change(function () {
            $('.dob').val($('.dob_year').val() + '-' + ('00' + $('.dob_month').val()).slice(-2) + '-' + ('00' + $('.dob_day').val()).slice(-2));
        });

        $('.gateway_cancel_button').on("click", function () {
            window.location = "{{ url($event->prefix) }}";
        });

        $('input[type=radio][name=pay]').change(function () {
            if (this.value == 'code') {
                $('#gateway').prop("selectedIndex", 0).prop("disabled", true);
                $('#code').prop("disabled", false).val('');
            } else {
                $('#gateway').prop("disabled", false).prop("selectedIndex", 0);
                $('#code').val('').prop("disabled", true);
            }
        });

    </script>
@endsection