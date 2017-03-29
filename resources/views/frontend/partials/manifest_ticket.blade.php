<div class="manifest_ticket_section" id="event">
    <h3>Evento</h3>
    <div class="manifest_ticket_key color_accent">Num. Corredor</div>
    <div class="manifest_ticket_value">{{ $options->bib }}</div>
    <div class="manifest_ticket_key color_accent">Evento</div>
    <div class="manifest_ticket_value">{{ $track->name }} ({{ $track->slug }})</div>
    <div class="manifest_ticket_key color_accent">Categoría</div>
    <div class="manifest_ticket_value">{{ $category->title() }} {{ $runner->gender }}</div>
</div>

<div class="manifest_ticket_section" id="personal">
    <h3>Corredor</h3>
    <div class="manifest_ticket_key color_accent">Apellidos</div>
    <div class="manifest_ticket_value">{{ $runner->name_last }}</div>
    <div class="manifest_ticket_key color_accent">Nombres</div>
    <div class="manifest_ticket_value">{{ $runner->name_first }}</div>
    <div class="manifest_ticket_key color_accent">Correo</div>
    <div class="manifest_ticket_value">{{ $runner->mail }}</div>
    <div class="manifest_ticket_key color_accent">Documento</div>
    <div class="manifest_ticket_value">{{ $runner->doc_type }} {{ $runner->doc_num }}</div>
    <div class="manifest_ticket_key color_accent">Talla</div>
    <div class="manifest_ticket_value">{{ $size->name_long }}</div>
</div>

<div class="manifest_ticket_section" id="subscription">
    <h3>Inscripción</h3>
    <div class="manifest_ticket_key color_accent">Medio de Inscripción</div>
    @if($options->transaction_id > 0)
        <div class="manifest_ticket_value">{{ $gateway->name }}</div>
        <div class="manifest_ticket_key color_accent">Transacción / Código</div>
        <div class="manifest_ticket_value">{{ $transaction->id }}</div>
        <div class="manifest_ticket_key color_accent">Monto</div>
        <div class="manifest_ticket_value">PEN (S/.) {{ $transaction->amount }}</div>
        <div class="manifest_ticket_key color_accent">Fecha</div>
        @if(is_null($transaction->gateway_datetime))
            <div class="manifest_ticket_value">{{ $options->updated_at }}</div>
        @else
            <div class="manifest_ticket_value">{{ $transaction->gateway_datetime }}</div>
        @endif
    @endif
    @if($options->code_id > 0)
        <div class="manifest_ticket_value">Código de Inscripción</div>
        <div class="manifest_ticket_key color_accent">Transacción / Código</div>
        <div class="manifest_ticket_value">{{ $code->code }}</div>
        <div class="manifest_ticket_key color_accent">Fecha</div>
        <div class="manifest_ticket_value">{{ $options->updated_at }}</div>
    @endif

</div>