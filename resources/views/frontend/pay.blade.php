<html>
<head></head>

{{--<body>--}}
<body onload="document.pay_form.submit()">

Procesando, por favor espere...

@if($event->test_mode = true)
    {!! Form::open(['url' => $transaction->gateway->url_emulator, 'name' => 'pay_form']) !!}
@else
    {!! Form::open(['url' => $transaction->gateway->url_production, 'name' => 'pay_form']) !!}
@endif

{!! Form::hidden('store_id', $transaction->gateway->store_id, ['class' => 'form-control']) !!}
{!! Form::hidden('ticket', $transaction->id, ['class' => 'form-control']) !!}
{!! Form::hidden('amount', $transaction->amount, ['class' => 'form-control']) !!}
{!! Form::hidden('response', url($event->prefix . '/' . $engine->id . '/' . $track->id . '/' . $runner->id . '/' . $transaction->id) . '/response', ['class' => 'form-control']) !!}

{!! Form::close() !!}

</body>
</html>