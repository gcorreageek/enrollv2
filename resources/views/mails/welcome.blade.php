<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ url('css/mail.css') }}">
    <link rel="stylesheet" href="{{ url('css/color.css') }}">

</head>

<body>

{{--<link rel="stylesheet" href="https://enroll.maromina.com/css/mail.css">--}}
{{--<link rel="stylesheet" href="https://enroll.maromina.com/css/color.css">--}}

<table cellpadding="0" cellspacing="0" align="center" id="mail_container">

    <tr>
        <td colspan="2" id="mail_top_bar" class="mail_top_bar_colors">
            <p>Ud. ha recibido este correo porque se ha inscrito satisfactoriamente
                a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</p>
        </td>
    </tr>

    <tr>
        <td colspan="2" id="mail_banner">
            @if(File::exists(public_path('skins/' . $event->prefix . '/mail_header.jpg')))
                <img src="{{ url('skins/' . $event->prefix . '/mail_header.jpg') }}">
            @else
                <img src="{{ url('images/mail_header.jpg') }}">
            @endif
        </td>
    </tr>

    <tr>
        <td colspan="2" id="mail_separator">&nbsp;</td>
    </tr>

    <tr>
        <td valign="top" id="mail_body">

            @include('frontend.partials.manifest_body')

            <div id="mail_disclaimer">
                @include('frontend.partials.manifest_disclaimer')
            </div>
        </td>
        <td valign="top" class="border_left border_color" id="mail_ticket">
            @include('frontend.partials.manifest_ticket')
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <table class="border_top border_bottom border_color" id="mail_ribbon">
                <tr>
                    <td id="mail_ribbon_bib">
                        {{ $options->bib }}
                    </td>
                    <td id="mail_ribbon_barcode">
                        <img src="{{ $app->barcode_repository }}bc{{ $options->bib }}.png">
                    </td>
                    <td id="mail_ribbon_size">
                        {{ $size->name_long }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="2" id="mail_footer">
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
        <td colspan="2" class="mail_copyright" id="mail_copyright">
            <p><a href="{{ DEV_URL }}" target="_blank">{{ APP_NAME }} v{{ APP_VERSION }}</a></p>
        </td>
    </tr>


</table>







</body>

</html>