@extends('backend')



@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if($safeTracks->count() > 0)
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('track', 'Distancia:', ['class' => 'sr-only']) !!}
                    {!! Form::select('track', $safeTracks->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una distancia']) !!}
                </div>
                <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
                {!! Form::close() !!}

            @else
                <h4>Lo sentimos, no existen tracks disponibles para cambio.</h4>
            @endif
        </div>
    </div>


@endsection