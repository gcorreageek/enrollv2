@extends("frontend")
@inject("documents", "App\Http\Utilities\Document")

@section("content")

    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
        <h3 class="text-center">{{ $event->name }} {{ $event->date->year }}</h3>
    </div>

    <div class="col-lg-6 col-lg-offset-3">

        <p>Para visualizar tu inscripción por favor ingresa el correo electrónico y el número de documento con los que
            realizaste el proceso de
            inscripción</p>
        <p>&nbsp;</p>

        {!! Form::open(['url' => $event->prefix . '/search']) !!}

        <div class="form-group">
            {!! Form::label('mail', 'Correo:', ['class' => 'sr-only']) !!}
            {!! Form::text('mail', null, ['class' => 'form-control', 'id' => 'mail', 'placeholder' => 'Correo electrónico']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('doc_num', 'Documento:', ['class' => 'sr-only']) !!}
            {!! Form::text('doc_num', null, ['class' => 'form-control', 'id' => 'doc_num', 'placeholder' => 'Número de documento']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Siguiente', ['class' => 'form-control btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection


@section("script")

@endsection