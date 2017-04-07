@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")
@inject("countries", "App\Http\Utilities\Country")
@inject("states", "App\Http\Utilities\State")
@inject("provinces", "App\Http\Utilities\Province")
@inject("cities", "App\Http\Utilities\City")
@inject("bloods", "App\Http\Utilities\Blood")
@inject("relationships", "App\Http\Utilities\Relationship")

@section("content")


    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
        <h2 class="text-center">{{ $engine->event->name }} {{ $engine->event->date->year }}</h2>
    </div>

    <div class="col-lg-6 col-lg-offset-3">

        {!! Form::model($options, ['url' => $prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . Crypt::encrypt($runner->id) . '/persist_options']) !!}

        @include('partials.subscription_form')


        <div class="checkbox">
            <label for="terms_agree">
                {!! Form::checkbox('terms_agree') !!}
                He leído y acepto el <a href="{{ $event->url_rules }}" target="_blank">reglamento</a> y los
                <a href="{!! $event->getEventDisclaimerURL() !!}" target="_blank">términos y condiciones</a> de
                participación del evento.
            </label>
        </div>

        <div class="checkbox">
            <label for="privacy_agree">
                {!! Form::checkbox('privacy_agree') !!}
                He leído y acepto las <a href="{!! $event->getEventPrivacyURL() !!}" target="_blank">políticas de
                    privacidad</a> del evento.
            </label>
        </div>




        @if($track->fields->count() > 0)
            @foreach($track->fields as $field)
                @if($field->type == 'checkbox')
                    <div class="checkbox">
                        <label for="{{ $field->name }}">
                            {!! Form::checkbox($field->name, null, $field->checked) !!}
                            {!! $field->label !!}
                        </label>
                    </div>
                @endif
            @endforeach
        @endif



        {!! Form::hidden('runner', $runner->id, ['class' => 'form-control']) !!}
        {!! Form::hidden('track', $track->id, ['class' => 'form-control']) !!}
        {{--{!! Form::hidden('ticket', $ticket, ['class' => 'form-control']) !!}--}}
        {{--{!! Form::hidden('transaction_id', $transaction->id, ['class' => 'form-control']) !!}--}}
        {{--{!! Form::hidden('code', $code->id, ['class' => 'form-control']) !!}--}}
        {{--{!! Form::hidden('gateway', $gateway->id, ['class' => 'form-control']) !!}--}}
        {!! Form::hidden('form', 'options', ['class' => 'form-control']) !!}

        <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
        {!! Form::close() !!}

    </div>

@endsection


@section("script")
    @if($options->time_goal != '00:00:00')
        <script>
            var time_goal = '{{ $options->time_goal }}';
            var hour_goal = Number(time_goal.substr(0, 2));
            var minute_goal = Number(time_goal.substr(3, 2));
            var second_goal = Number(time_goal.substr(6, 2));

            $('#hour_goal').val(hour_goal);
            $('#minute_goal').val(minute_goal);
            $('#second_goal').val(second_goal);
        </script>
    @endif

    @if($options->time_best != '00:00:00')
        <script>
            var time_best = '{{ $options->time_best }}';
            var hour_best = Number(time_best.substr(0, 2));
            var minute_best = Number(time_best.substr(3, 2));
            var second_best = Number(time_best.substr(6, 2));

            $('#hour_best').val(hour_best);
            $('#minute_best').val(minute_best);
            $('#second_best').val(second_best);
        </script>
    @endif

@endsection