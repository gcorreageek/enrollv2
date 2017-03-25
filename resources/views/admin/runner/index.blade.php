{{--{{ dd($runners) }}--}}
@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            {!! Form::open() !!}
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

    @if(isset($runners))
        <div class="row">
            <div class="col-sm-12 text-right">{!! $message !!}</div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Documento</th>
                        <th>Género</th>
                        <th>Fecha Nac.</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($runners as $runner)
                        <tr>
                            <td>{{ ucwords(strtolower($runner->name_last)) }}, {{ ucwords(strtolower($runner->name_first)) }}</td>
                            <td>{{ $runner->doc_type }} {{ $runner->doc_num }}</td>
                            <td>{{ $runner->gender }}</td>
                            <td>{{ $runner->dob->format('d-m-Y') }}</td>
                            <td><a href="mailto: {{ $runner->mail }}">{{ $runner->mail }}</a></td>
                            <td>
                                <a href="{!! url('admin/runner/' . $runner->id) !!}"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
                                <a href="{!! url('admin/runner/' . $runner->id . '/edit') !!}"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="col-sm-12 text-center">{!! $message !!}</div>
    @endif

@endsection