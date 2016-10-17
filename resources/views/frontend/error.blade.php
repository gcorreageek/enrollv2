@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")

@section("content")

    <div class="col-lg-6 col-lg-offset-3">
        <h1>Ooops!!!</h1>
        <p>{!! $error !!}</p>
        {{--<p><a href="{{ url($race->prefix . $back_to) }}">Volver a intentar</a></p>--}}
    </div>

@endsection


@section("script")

@endsection