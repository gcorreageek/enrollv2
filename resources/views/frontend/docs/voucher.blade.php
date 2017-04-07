<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <title>{{ $event->name }} - Voucher transacción {{ $transaction->id }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>

<body>

<h2>{{ $event->name }}</h2>
<h3>Voucher de transacción electrónica</h3>
<p>&nbsp;</p>

<div class="table-responsive" style="font-family: sans-serif !important;">
    <table class="table table-striped">
        <tbody>
        <tr>
            <td>Transacción</td>
            <td>{{ $transaction->id }}</td>
        </tr>
        <tr>
            <td>Medio de pago</td>
            <td>{{ $transaction->gateway->name }}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>{{ $runner->name_last }}, {{ $runner->name_first }}</td>
        </tr>
        <tr>
            <td>Tarjeta</td>
            <td>{{ $transaction->card_number }}</td>
        </tr>
        <tr>
            <td>Fecha y hora</td>
            @if(is_null($transaction->gateway_datetime) || $transaction->gateway_datetime == "")
                <td>{{ $transaction->updated_at }}</td>
            @else
                <td>{{ $transaction->gateway_datetime }}</td>
            @endif
        </tr>
        <tr>
            <td>Importe</td>
            <td>PEN S/. {{ $transaction->amount }}</td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>{{ $event->name }} / {{ $track->name }} ({{ $track->slug }})</td>
        </tr>
        </tbody>
    </table>
</div>







</body>
</html>