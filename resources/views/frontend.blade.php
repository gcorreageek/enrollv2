<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/color.css') }}">
    @if(File::exists(public_path('skins/' . $event->prefix . '/style.css')))
        <link rel="stylesheet" href="{{ url('skins/' . $event->prefix . '/style.css') }}">
    @endif
    <title>Pacific Timing - Enroll Engine : {{ $event->name }} {{ $event->date->year }}</title>
</head>

<body id="app_body">

<div class="container " id="enroll_header">
    @if(File::exists(public_path('skins/' . $event->prefix . '/logo.png')))
        <div id="enroll_header_logo"><img src="{{ url('skins/' . $event->prefix . '/logo.png') }}" ></div>
    @else
        <div id="enroll_header_logo"><img src="{{ url('skins/default/logo.png') }}" ></div>
    @endif
</div>

<div class="container enroll_container" id="enroll_content">
    <div class="row">
        @yield("content")
    </div>
</div>

<div id="enroll_footer">
    <div class="container">
        <p class="text-right">
            {{ APP_NAME }} v{{ APP_VERSION }} desarrollado por <a href="{{ DEV_URL }}" target="_blank">{{ DEV_NAME }}</a>
        </p>
    </div>
</div>




    <script src="{{ url('js/app.js') }}"></script>
    @yield("script")
</body>
</html>