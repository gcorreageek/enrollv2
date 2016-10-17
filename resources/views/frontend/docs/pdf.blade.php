<html>
<head>
    <link rel="stylesheet" href="{{ url('css/pdf.css') }}">
    <link rel="stylesheet" href="{{ url('css/color.css') }}">

    @if(File::exists(public_path('skins/' . $event->prefix . '/skin.css')))
        <link rel="stylesheet" href="{{ url('skins/' . $event->prefix . '/skin.css') }}">
    @endif
</head>

<body id="pdf_body">

<div>
    @if(File::exists(public_path('skins/' . $event->prefix . '/mail_header.jpg')))
        <img src="{{ url('skins/' . $event->prefix . '/mail_header.jpg') }}" class="pdf_banner">
    @else
        <img src="{{ url('images/mail_header.jpg') }}" class="pdf_banner">
    @endif
</div>

<table cellspacing="0" cellpadding="0" class="pdf_container">
    <tr>
        <td class="pdf_body">

            @include('frontend.partials.manifest_body')

            <div id="pdf_disclaimer">
                @include('frontend.partials.manifest_disclaimer')
            </div>
        </td>
        <td class="pdf_ticket border_left border_color">
            @include('frontend.partials.manifest_ticket')
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="border_top border_bottom border_color" id="pdf_ribbon">
                <tr>
                    <td id="pdf_ribbon_bib">
                        {{ $options->bib }}
                    </td>
                    <td id="pdf_ribbon_barcode">
                        <img src="{{ $app->barcode_repository }}bc{{ $options->bib }}.png" class="pdf_barcode">
                    </td>
                    <td id="pdf_ribbon_size">
                        {{ $size->name_long }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="pdf_footer">
            @include('frontend.partials.manifest_footer')
        </td>
    </tr>
    <tr>
        <td colspan="2" class="pdf_copyright">
            {{--<p><a href="{{ DEV_URL }}">{{ APP_NAME }} v{{ APP_VERSION }}</a></p>--}}
        </td>
    </tr>
</table>
</body>
</html>