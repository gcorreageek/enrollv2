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


        @include('partials.runner_form')


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
        var country = '{{ $defaultCountry }}';
        var state = '{{ $defaultState }}';
        var province = '{{ $defaultProvince }}';

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