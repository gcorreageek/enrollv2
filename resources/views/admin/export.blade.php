@extends('backend')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                {!! Form::open() !!}

                <div class="form-group">
                    {!! Form::select('format', ['excel_win' => 'CSV para Excel (Windows)', 'standard' => 'CSV Estándar'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un formato']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Descargar', ['class' => 'form-control btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection