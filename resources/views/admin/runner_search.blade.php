@extends('backend')

@section('content')


{!! Form::open(['url' => 'admin/runner_found']) !!}

<div class="form-group">
    {!! Form::label('criteria', 'Criterio:', ['class' => 'sr-only']) !!}
    {!! Form::text('criteria', null, ['class' => 'form-control', 'placeholder' => 'Num. Documento / Apellido(s)']) !!}
</div>

<div class="form-group">{!! Form::submit('Consultar', ['class' => 'form-control btn btn-primary']) !!}</div>

{!! Form::close() !!}


@endsection