<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</title>
</head>

<body>


<div id="topbar" style="width: 100%; padding-top: 7px; font-family: sans-serif; height: 18px; text-align: center; font-size: 11px; color: #FFFFFF; background-color: #222222;">Ud. ha recibido este correo porque se ha inscrito satisfactoriamente a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</div>

<div id="main_container" style="font-family: sans-serif; width: 100%; padding: 60px 0px 20px 0px; background: #222222 url('{{ url('skins/' . $event->prefix . '/mail_background.jpg') }}') no-repeat center top;">

    <table id="mail_header" cellpadding="0" cellspacing="0" align="center" style="width: 760px; margin-bottom: 30px;">
        <tr>
            <td id="mail_logo" style="text-align: left;">
                @if(File::exists(public_path('skins/' . $event->prefix . '/logo.png')))
                    <img src="{{ url('skins/' . $event->prefix . '/logo.png') }}" height="65">
                @endif
            </td>
            <td id="mail_emblem" style="text-align: right;">
                @if(File::exists(public_path('skins/' . $event->prefix . '/emblem.png')))
                    <img src="{{ url('skins/' . $event->prefix . '/emblem.png') }}" height="65">
                @endif
            </td>
        </tr>
    </table>

    <table id="mail_container" cellpadding="0" cellspacing="0" align="center" style="width: 760px; background-color: rgba(255, 255, 255, 0.85);">

        <tr><td colspan="2" id="mail_separator" style="height: 20px;">&nbsp</td></tr>

        <tr>
            <td valign="top" id="mail_body" style="width: 520px; text-align: justify; padding: 0px 45px 30px 40px; font-size: 12px;">

                @include('frontend.partials.manifest_body')

                <div id="mail_disclaimer" style="font-size: 10px; margin-top: 60px; text-align: justify;">
                    @include('frontend.partials.manifest_disclaimer')
                </div>
            </td>
            <td valign="top" class="border_left border_color" id="mail_ticket" style="border-left: 1px dotted #444444; width: 240px; padding-right: 25px; padding-left: 25px; font-size: 12px; padding-bottom: 30px;">
                <div class="manifest_ticket_section" id="event">
                    <h3>Evento</h3>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Num. Corredor</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $options->bib }}</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Evento</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $track->name }} ({{ $track->slug }})</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Categoría</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $category->title() }} {{ $runner->gender }}</div>
                </div>

                <div style="height: 20px;">&nbsp</div>

                <div class="manifest_ticket_section" id="personal">
                    <h3>Corredor</h3>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Apellidos</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $runner->name_last }}</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Nombres</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $runner->name_first }}</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Correo</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $runner->mail }}</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Documento</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $runner->doc_type }} {{ $runner->doc_num }}</div>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Talla</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $size->name_long }}</div>
                </div>

                <div style="height: 20px;">&nbsp</div>

                <div class="manifest_ticket_section" id="subscription">
                    <h3>Inscripción</h3>
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Medio de Inscripción</div>
                    @if($options->transaction_id > 0)
                        <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $gateway->name }}</div>
                        <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Transacción / Código</div>
                        <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $transaction->id }}</div>
                        <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Monto</div>
                        <div class="manifest_ticket_value" style="margin-bottom: 8px;">PEN (S/.) {{ $transaction->amount }}</div>
                    @endif
                    @if($options->code_id > 0)
                        <div class="manifest_ticket_value" style="margin-bottom: 8px;">Código de Inscripción</div>
                        <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Transacción / Código</div>
                        <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $code->code }}</div>
                    @endif
                    <div class="manifest_ticket_key color_accent" style="text-transform: uppercase; font-size: 8px; font-weight: bolder; color: #0b5895;">Fecha</div>
                    <div class="manifest_ticket_value" style="margin-bottom: 8px;">{{ $options->updated_at }}</div>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <table class="border_top border_bottom border_color" id="mail_ribbon" style="border-top: 1px dotted #444444; border-bottom: 1px dotted #444444; height: 80px; width: 760px; font-size: 18px; text-align: center;">
                    <tr>
                        <td id="mail_ribbon_bib" style="width: 30%;">
                            {{ $options->bib }}
                        </td>
                        <td id="mail_ribbon_barcode" style="width: 40%;">
                            <img src="{{ $app->barcode_repository }}bc{{ $options->bib }}.png" style="width: 100%;">
                        </td>
                        <td id="mail_ribbon_size" style="width: 30%;">
                            {{ $size->name_long }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2" id="mail_footer" style="height: 100px; font-size: 10px; padding: 30px 50px 40px 50px; text-align: justify;">
                @include('frontend.partials.manifest_footer')
                <p>Este correo puede contener elementos gráficos como códigos de barra, códigos QR u otros,
                    que fueron incluidos para facilitar y agilizar la ubicación de su kit de corredor durante
                    los dias de entrega, si Ud. cuenta con algún tipo de filtro o bloqueo de imágenes le
                    agradeceremos lo deshabilite para este correo.</p>
                <p>Este correo y todo su contenido es confidencial y esta dirigido solo y únicamente al
                    destinatario registrado; si Ud. ha recibido este correo por error, por favor
                    elimínelo de su sistema y no comparta su contenido.</p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="mail_copyright" id="mail_copyright" style="height: 30px; text-align: right; padding: 15px; font-size: 10px;">
                <p><a href="{{ DEV_URL }}" target="_blank">{{ APP_NAME }} v{{ APP_VERSION }}</a></p>
            </td>
        </tr>


    </table>
</div>

</body>

</html>