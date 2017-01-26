@extends('backend')

@section('content')


    <div class="col-md-5">Nombre Completo</div>
    <div class="col-md-2">Documento</div>
    <div class="col-md-1">Género</div>
    <div class="col-md-2">Fecha Nac.</div>
    <div class="col-md-2">Opciones</div>

@foreach($runners as $runner)
    <div class="col-md-5">{{ ucwords(strtolower($runner->name_last)) }}, {{ ucwords(strtolower($runner->name_first)) }}</div>
    <div class="col-md-2">{{ $runner->doc_type }} {{ $runner->doc_num }}</div>
    <div class="col-md-1">{{ $runner->gender }}</div>
    <div class="col-md-2">{{ $runner->dob->format('d-m-Y') }}</div>
    <div class="col-md-2">
        <a href="{!! url('admin/runner/' . $runner->id) !!}">Ver</a>&nbsp;&nbsp;&nbsp;
        <a href="{!! url('admin/runner/' . $runner->id . '/edit') !!}">Editar</a>
    </div>

    {{--@foreach($runner->tracks as $track)--}}
        {{--<div class="col-md-1">&nbsp;</div>--}}
        {{--<div class="col-md-2">{{ $track->engine->event->name }} {{ $track->engine->event->date->year }}</div>--}}
        {{--<div class="col-md-2">{{ $track->name }}</div>--}}
        {{--@if($track->pivot->transaction_id == 0)--}}
            {{--<div class="col-md-1">{{ array_get($track->codes->find($track->pivot->code_id), 'code') }}</div>--}}
        {{--@else--}}
            {{--<div class="col-md-1">{{ $track->pivot->transaction_id }}</div>--}}
        {{--@endif--}}
        {{--<div class="col-md-1">{{ $track->pivot->bib }}</div>--}}
        {{--<div class="col-md-2">{{ $track->pivot->updated_at->format('d-m-Y') }}</div>--}}
        {{--<div class="col-md-3">&nbsp;</div>--}}
    {{--@endforeach--}}

@endforeach

    <div class="form-group">{!! Form::button('Nueva búsqueda', ['class' => 'form-control btn btn-warning new_search_button']) !!}</div>


@endsection


@section('script')
    <script>
        $('.new_search_button').on("click", function () {
            window.location = "{{ url('admin/runner_search') }}";
            return false;
        });
    </script>
@endsection