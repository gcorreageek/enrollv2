@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            {!! Form::open(['url' => 'admin/runner_found']) !!}
            <div class="form-group">
                {!! Form::label('criteria', 'Criterio:', ['class' => 'sr-only']) !!}
                {!! Form::text('criteria', null, ['class' => 'form-control', 'placeholder' => 'Num. Documento / Apellido(s)']) !!}
            </div>
            <div class="form-group">{!! Form::submit('Consultar', ['class' => 'form-control btn btn-primary']) !!}</div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>

    <hr>

@endsection