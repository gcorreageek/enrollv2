@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")

@section("content")


    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
        <h2 class="text-center">{{ $event->name }} {{ $event->date->year }}</h2>
    </div>


    <div class="col-lg-6 col-lg-offset-3">

        @foreach($event->engines as $engine)
            <div class="engine_selector" id="engine_selector_{{ $engine->id }}">
                {!! Form::button('<h3>' . $engine->name . '</h3>', ['class' => 'form-control btn btn-default event_selector_button', 'id' => $engine->id])!!}
            </div>
        @endforeach

    </div>


@endsection


@section("script")
    <script>

        $('.event_selector_button').on("click", function () {
            window.location = "{{ url($event->prefix) }}/" + $(this).attr('id') + "/gateway";
        });

    </script>
@endsection