<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</title>
</head>

<body>

<style>
    #topbar{width: 100%; padding-top: 7px; font-family: sans-serif; height: 18px; text-align: center; font-size: 11px; color: #FFFFFF; background-color: #222222;}
    /*#main_container{font-family: sans-serif; width: 100%; padding: 60px 0px 20px 0px; background: #222222 url("http://lima42k.com/images/2017/170521_lima42k_mail-background.jpg") no-repeat center top;}*/
    #main_container{font-family: sans-serif; width: 100%; padding: 60px 0px 20px 0px; background: #222222 url("{{ url('skins/' . $event->prefix . '/mail_background.jpg') }}") no-repeat center top;}
    #mail_header{width: 760px; margin-bottom: 30px;}
    #mail_logo{text-align: left;}
    #mail_emblem{text-align: right;}
    #mail_container{width: 760px; border: 1px solid #222222; background-color: rgba(255, 255, 255, 0.85); border-radius: 16px;}
    #mail_separator{height: 20px;}
    #mail_body{width: 520px; text-align: justify; padding: 0px 45px 30px 40px; font-size: 12px;}
    #mail_disclaimer{font-size: 10px; margin-top: 60px; text-align: justify;}
    #mail_ticket{width: 240px; padding-right: 25px; padding-left: 25px; font-size: 12px; padding-bottom: 30px;}
    .manifest_ticket_key{text-transform: uppercase; font-size: 8px; font-weight: bold; color: #473192;}
    .manifest_ticket_value { margin-bottom: 8px;}
    #mail_ribbon{height: 80px; width: 760px; font-size: 18px; text-align: center;}
    #mail_ribbon_bib, #ribbon_size{width: 30%;}
    #mail_ribbon_barcode{width: 40%;}
    #mail_ribbon_barcode img{width: 100%;}
    #mail_footer{height: 100px; font-size: 10px; padding: 30px 50px 40px 50px; text-align: justify;}
    #mail_copyright{height: 30px; text-align: right; padding: 15px; font-size: 10px;}

    .border_top {border-top: 1px dotted #EE255C;}
    .border_right{border-right: 1px dotted #EE255C;}
    .border_bottom{border-bottom: 1px dotted #EE255C;}
    .border_left{border-left: 1px dotted #EE255C;}
    #mail_container h1, #mail_container h2, #mail_container h3, #mail_container h4, #mail_container h5, #mail_container h6{color: #EE255C !important;}
    #mail_container a{color: #473192;}
    #mail_container a:hover{color: #EE255C;}

    /*violet: #473192;*/
    /*pink: #EE255C;*/
    /*yellow: #FFEF00;*/
    /*gray: #222222;*/
</style>

<div id="topbar">Ud. ha recibido este correo porque se ha inscrito satisfactoriamente a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</div>

<div id="main_container">

    <table id="mail_header" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td id="mail_logo">
                @if(File::exists(public_path('skins/' . $event->prefix . '/logo.png')))
                    <img src="{{ url('skins/' . $event->prefix . '/logo.png') }}" height="65">
                @endif
            </td>
            <td id="mail_emblem">
                @if(File::exists(public_path('skins/' . $event->prefix . '/emblem.png')))
                    <img src="{{ url('skins/' . $event->prefix . '/emblem.png') }}" height="65">
                @endif
            </td>
        </tr>
    </table>

    <table id="mail_container" cellpadding="0" cellspacing="0" align="center">

        <tr><td colspan="2" id="mail_separator">&nbsp</td></tr>

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
</div>

</body>

</html>