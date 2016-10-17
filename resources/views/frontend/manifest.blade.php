@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")

@section("content")

    <div class="col-xs-12 text-right border_bottom border_color" id="manifest_nav">
        <button class="btn btn-default" id="pdfButton">Descargar PDF</button>
        <button class="btn btn-default" id="newButton">Nueva Inscripción</button>
    </div>

    <div class="col-sm-8 border_right border_color text-justify" id="manifest_body">


        @include('frontend.partials.manifest_body')

        <div id="manifest_disclaimer">
            @include('frontend.partials.manifest_disclaimer')
            <p>Para su comodidad, se le envió una copia de esta información a la casilla de correo que especificó al momento de su inscripción.</p>
        </div>


    </div>




    <div class="col-sm-4" id="manifest_ticket">

        @include('frontend.partials.manifest_ticket')
        <div class="manifest_ticket_section" id="barcode">
            <img src="{{ $app->barcode_repository }}bc{{ $options->bib }}.png" alt="">
        </div>

    </div>





    <div class="col-sm-12 border_top border_color" id="manifest_footer">

        @include('frontend.partials.manifest_footer')

    </div>

@endsection


@section("script")
    <script>
        $('#pdfButton').on("click", function () {
            window.location = "{{ url($event->prefix . '/' . $engine->id . '/' . $track->id . '/' . $runner->id . '/manifest/docs/pdf/' . $encrypted_track_id . '/' . $encrypted_runner_id) }}";
        });
        $('#newButton').on("click", function () {
            window.location = "{{ url($event->prefix) }}";
        });
    </script>
@endsection