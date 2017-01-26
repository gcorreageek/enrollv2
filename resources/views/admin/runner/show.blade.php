@extends('backend')





@section('content')

    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Apellidos</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->name_last }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Nombres</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->name_first }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Género</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->gender }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">DOB</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->dob }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Documento</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->doc_type }} {{ $runner->doc_num }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Correo</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value"><a href="{{ $runner->mail }}">{{ $runner->mail }}</a></span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Teléfono</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->telephone }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Móvil</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->mobile }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">País</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->country }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Departamento</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->state }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Provincia</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->province }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Distrito</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->city }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">G. Sanguíneo</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->blood }}</span>
    </div>


    <div class="col-lg-2 col-lg-offset-3">
        <span class="model-view-key">Alergias</span>
    </div>
    <div class="col-lg-3">
        <span class="model-view-value">{{ $runner->allergies }}</span>
    </div>


    <div class="col-lg-5 col-lg-offset-3">
        {!! Form::open(['url' => 'admin/runner/' . $runner->id . '/edit', 'method' => 'get']) !!}
        <div class="form-group">{!! Form::submit('Editar', ['class' => 'form-control btn btn-primary']) !!}</div>
        <div class="form-group">{!! Form::button('Nueva búsqueda', ['class' => 'form-control btn btn-warning new_search_button']) !!}</div>
        {!! Form::close() !!}
    </div>

@endsection



@section('script')
    <script>
        $('.cancel_button').on("click", function () {
            parent.history.back();
            return false;
        });

        $('.new_search_button').on("click", function () {
            window.location = "{{ url('admin/runner_search') }}";
            return false;
        });
    </script>
@endsection
