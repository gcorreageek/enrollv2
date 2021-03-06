
@if($track->custom_bib == true)
    <div class="form-group">
        {!! Form::label('nickname', 'Apodo:', ['class' => 'sr-only']) !!}
        {!! Form::text('nickname', null, ['class' => 'form-control', 'placeholder' => 'Apodo / nombre corto']) !!}
        <p class="form-control-static text-justify">
            <small>IMPORTANTE: Los nombres cortos (apodos) solo admiten hasta 12 caracteres como máximo y serán
                impresos en el NÚMERO DE COMPETENCIA como una cortesía de los organizadores y sólo por tiempo
                limitado. El participante podrá elegir el nombre que desee siempre y cuando no resulte ofensivo
                a la
                moral, al espíritu de competencia ni a ninguna marca comercial de las empresas organizadoras y/o
                patrocinadoras. La empresa organizadora se reserva el derecho de eliminar cualquier nombre corto
                que
                haga referencia directa o indirecta a cualquier tipo de discriminación, racismo, conducta o
                pensamiento negativo y/o antideportivo y usar o no en su lugar el nombre real del participante.
            </small>
        </p>
    </div>
@endif

<div class="form-group">
    {!! Form::label('size_id', 'Talla:', ['class' => 'sr-only']) !!}
    {!! Form::select('size_id', $sizes->pluck('name_long', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una talla']) !!}
</div>

<p class="form-control-static">Contacto de Emergencia</p>
<div class="form-group">
    {!! Form::label('relative_relationship', 'Vínculo:', ['class' => 'sr-only']) !!}
    {!! Form::select('relative_relationship', $relationships::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un vínculo']) !!}
</div>

<div class="form-group">
    {!! Form::label('relative_name', 'Nombre:', ['class' => 'sr-only']) !!}
    {!! Form::text('relative_name', null, ['class' => 'form-control', 'placeholder' => 'Nombre contacto']) !!}
</div>

<div class="form-group">
    {!! Form::label('relative_phone', 'Teléfono:', ['class' => 'sr-only']) !!}
    {!! Form::text('relative_phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono contacto']) !!}
</div>


@if($track->starting_corrals == true)
    <p class="form-control-static">Tiempo Objetivo</p>
    <p class="form-control-static text-justify">Se refiere al tiempo que Ud. calcula que le tomará culminar la
        distancia elegida.
        <small></small>
    </p>
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-xs-6 hour_selector_container">
                {!! Form::label('hour_goal', 'Horas:', ['class' => 'sr-only']) !!}
                @if($edit_mode == true)
                    {!! Form::selectRange('hour_goal', 0, 12, $time_goal->hour, ['class' => 'form-control time_component hour', 'placeholder' => 'Horas'])!!}
                @else
                    {!! Form::selectRange('hour_goal', 0, 12, null, ['class' => 'form-control time_component hour', 'placeholder' => 'Horas'])!!}
                @endif
            </div>

            <div class="form-group col-xs-6 minute_selector_container">
                {!! Form::label('minute_goal', 'Minutos:', ['class' => 'sr-only']) !!}
                @if($edit_mode == true)
                    {!! Form::select('minute_goal', ['0' => '0', '5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55'], $time_goal->minute, ['class' => 'form-control time_component minute', 'placeholder' => 'Minutos'])!!}
                @else
                    {!! Form::select('minute_goal', ['0' => '0', '5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55'], null, ['class' => 'form-control time_component minute', 'placeholder' => 'Minutos'])!!}
                @endif
                {!! Form::hidden('second_goal', '0', ['class' => 'form-control']) !!}
            </div>

            {{--<div class="form-group col-xs-4 second_selector_container">--}}
            {{--{!! Form::label('second_goal', 'Segundos:', ['class' => 'sr-only']) !!}--}}
            {{--{!! Form::selectRange('second_goal', 0, 59, null, ['class' => 'form-control time_component second', 'placeholder' => 'Segundos']) !!}--}}
            {{--</div>--}}
        </div>
    </div>
    {!! Form::hidden('time_goal', null, ['class' => 'form-control time_goal']) !!}


    <p class="form-control-static">Mejor Tiempo (Personal Best)</p>
    <p class="form-control-static text-justify">Se refiere al mejor tiempo que Ud. haya logrado obtener en
        cualquier
        otro evento similar, este tiempo deberá ser comprobable para ser considerado en la asignación de
        corrales de
        partida. Para este fin por favor proporcione tambien el nombre del evento donde logro obtenerlo y la URL
        de
        los resultados del mismo.
        <small></small>
    </p>
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-xs-4 hour_selector_container">
                {!! Form::label('hour_best', 'Horas:', ['class' => 'sr-only']) !!}
                @if($edit_mode == true)
                    {!! Form::selectRange('hour_best', 0, 12, $time_best->hour, ['class' => 'form-control time_component hour', 'placeholder' => 'Horas'])!!}
                @else
                    {!! Form::selectRange('hour_best', 0, 12, null, ['class' => 'form-control time_component hour', 'placeholder' => 'Horas'])!!}
                @endif
            </div>

            <div class="form-group col-xs-4 minute_selector_container">
                {!! Form::label('minute_best', 'Minutos:', ['class' => 'sr-only']) !!}
                @if($edit_mode == true)
                    {!! Form::selectRange('minute_best', 0, 59, $time_best->minute, ['class' => 'form-control time_component minute', 'placeholder' => 'Minutos'])!!}
                @else
                    {!! Form::selectRange('minute_best', 0, 59, null, ['class' => 'form-control time_component minute', 'placeholder' => 'Minutos'])!!}
                @endif
            </div>

            <div class="form-group col-xs-4 second_selector_container">
                {!! Form::label('second_best', 'Segundos:', ['class' => 'sr-only']) !!}
                @if($edit_mode == true)
                    {!! Form::selectRange('second_best', 0, 59, $time_best->second, ['class' => 'form-control time_component second', 'placeholder' => 'Segundos']) !!}
                @else
                    {!! Form::selectRange('second_best', 0, 59, null, ['class' => 'form-control time_component second', 'placeholder' => 'Segundos']) !!}
                @endif
            </div>
        </div>
    </div>
    {!! Form::hidden('time_best', null, ['class' => 'form-control time_best']) !!}

    <div class="form-group">
        {!! Form::label('event_name', 'Evento:', ['class' => 'sr-only']) !!}
        {!! Form::text('event_name', null, ['class' => 'form-control', 'placeholder' => 'Evento']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('event_url', 'URL:', ['class' => 'sr-only']) !!}
        {!! Form::text('event_url', null, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
    </div>
@endif

{!! Form::hidden('runner', $runner->id, ['class' => 'form-control']) !!}
{!! Form::hidden('track', $track->id, ['class' => 'form-control']) !!}
{{--{!! Form::hidden('ticket', $ticket, ['class' => 'form-control']) !!}--}}
{{--{!! Form::hidden('transaction_id', $transaction->id, ['class' => 'form-control']) !!}--}}
{{--{!! Form::hidden('code', $code->id, ['class' => 'form-control']) !!}--}}
{{--{!! Form::hidden('gateway', $gateway->id, ['class' => 'form-control']) !!}--}}
{!! Form::hidden('form', 'options', ['class' => 'form-control']) !!}