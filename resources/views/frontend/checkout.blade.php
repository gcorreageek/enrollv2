@extends("frontend")

@inject("documents", "App\Http\Utilities\Document")
@inject("countries", "App\Http\Utilities\Country")
@inject("states", "App\Http\Utilities\State")
@inject("provinces", "App\Http\Utilities\Province")
@inject("cities", "App\Http\Utilities\City")
@inject("bloods", "App\Http\Utilities\Blood")


@section("content")

    <div class="col-xs-12">
        <h2 class="text-center">{{ $engine->event->name }} {{ $engine->event->date->year }}</h2>
    </div>

    <div class="col-lg-6 col-lg-offset-3">
        <div class="form-group">
            {!! Form::label('name', 'Nombre :', null) !!}
            {!! Form::text('name', $runner->name_last . ', ' . $runner->name_first, ['class' => 'form-control', 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('doc', 'Documento :', null) !!}
            {!! Form::text('doc', $runner->doc_type . ' ' . $runner->doc_num, ['class' => 'form-control', 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('track', 'Distancia :', null) !!}
            {!! Form::text('track', $track->name . ' (' . $track->slug . ')', ['class' => 'form-control', 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('amount', 'Monto :', null) !!}
            {!! Form::text('amount', 'PEN S/. ' . $transaction->amount, ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-lg-offset-3 text-center" id="pay_button">
        @if($transaction->gateway_id == 1)
            {!! Form::open([]) !!}
            <script src="https://static-content.vnforapps.com/v1/js/checkout.js?qa=true"
                    data-sessiontoken="{{ $session_token }}"
                    data-merchantid="{{ $transaction->gateway->store_id }}"
                    data-buttonsize=""
                    data-buttoncolor=""
                    data-merchantlogo ="{{ url('skins/' . $event->prefix . '/logo.png') }}"
                    data-merchantname=""
                    data-formbuttoncolor="#0A0A2A"
                    data-showamount=""
                    data-purchasenumber="{{ $transaction->id }}"
                    data-amount="{{ $transaction->amount }}"
                    data-cardholdername=""
                    data-cardholderlastname=""
                    data-cardholderemail=""
                    data-usertoken=""
                    data-recurrence="false"
                    data-frequency="Quarterly"
                    data-recurrencetype="fixed"
                    data-recurrenceamount="200"
                    data-documenttype="0"
                    data-documentid=""
                    data-beneficiaryid="TEST1123"
                    data-productid=""
                    data-phone=""
            >
            </script>
            {!! Form::close() !!}
        @else
            @if($event->test_mode == true)
                {!! Form::open(['url' => $transaction->gateway->url_emulator, 'name' => 'pay_form']) !!}
            @else
                {!! Form::open(['url' => $transaction->gateway->url_production, 'name' => 'pay_form']) !!}
            @endif

            {!! Form::hidden('store_id', $transaction->gateway->store_id, ['class' => 'form-control']) !!}
            {!! Form::hidden('ticket', $transaction->id, ['class' => 'form-control']) !!}
            {!! Form::hidden('amount', $transaction->amount, ['class' => 'form-control']) !!}
            {!! Form::hidden('response', url($event->prefix . '/' . $engine->id . '/' . $track->id . '/' . $runner->id . '/' . $transaction->id) . '/response', ['class' => 'form-control']) !!}
            {!! Form::submit('Pagar', ['class' => 'form-control btn btn-primary']) !!}

            {!! Form::close() !!}
        @endif
    </div>

@endsection
