<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    {{--@if(File::exists(public_path('skins/' . $event->prefix . '/style.css')))--}}
        {{--<link rel="stylesheet" href="{{ url('skins/' . $event->prefix . '/style.css') }}">--}}
    {{--@endif--}}

    {{--@if($event->id == 0)--}}
        {{--<title>{{ $event->application->owner_nickname }} - {{ APP_NAME }}</title>--}}
    {{--@else--}}
        {{--<title>{{ $event->application->owner_nickname }} - {{ APP_NAME }} : {{ $event->name }} {{ $event->date->year }}</title>--}}
    {{--@endif--}}

</head>

<body>

<div class="container-fluid" id="admin_top-bar">
    {{ APP_NAME }} v{{ APP_VERSION }}
</div>

{{--<div class="container " id="admin_header">--}}
    {{--@if(File::exists(public_path('skins/default/logo.png')))--}}
        {{--<div id="enroll_header_logo"><img src="{{ url('skins/default/logo.png') }}" height="70"></div>--}}
    {{--@endif--}}
{{--</div>--}}

<div class="container admin_container" id="admin_content">
    @yield("content")
</div>

<div id="admin_footer">
    <div class="container">
        <p class="text-right">
            {{ APP_NAME }} desarrollado por <a href="{{ DEV_URL }}" target="_blank">{{ DEV_NAME }}</a>
        </p>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="{{ url('js/app.js') }}"></script>
@yield("script")
</body>
</html>