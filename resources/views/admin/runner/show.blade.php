@extends('backend')





@section('content')

    <div class="row">
        <div class="col-md-5">
            <table class="table table-bordered">
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                <tbody>
                <tr>
                    <td>Apellidos</td>
                    <td>{{ $runner->name_last }}</td>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td>{{ $runner->name_first }}</td>
                </tr>
                <tr>
                    <td>Género</td>
                    <td>{{ $runner->longGender() }}</td>
                </tr>
                <tr>
                    <td>Fecha nac.</td>
                    <td>{{ $runner->dob->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Documento</td>
                    <td>{{ $runner->doc_type }} {{ $runner->doc_num }}</td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><a href="mailto: {{ $runner->mail }}">{{ $runner->mail }}</a></td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td>{{ $runner->telephone }}</td>
                </tr>
                <tr>
                    <td>Móvil</td>
                    <td>{{ $runner->mobile }}</td>
                </tr>
                <tr>
                    <td>País</td>
                    <td>{{ $runner->country }}</td>
                </tr>
                <tr>
                    <td>Departamento</td>
                    <td>{{ $runner->state }}</td>
                </tr>
                <tr>
                    <td>Provincia</td>
                    <td>{{ $runner->province }}</td>
                </tr>
                <tr>
                    <td>Distrito</td>
                    <td>{{ $runner->city }}</td>
                </tr>
                <tr>
                    <td>G. Sanguíneo</td>
                    <td>{{ $runner->blood }}</td>
                </tr>
                <tr>
                    <td>Alergias</td>
                    <td>{{ $runner->allergies }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-7">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Track</th>
                    <th>BIB</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($runner->tracks as $track)
                <tr>
                    <td>{{ $track->engine->event->name }} {{ $track->engine->event->date->year }}</td>
                    <td>{{ $track->name }}</td>
                    <td>{{ $track->pivot->bib }}</td>
                    <td>{{ $track->pivot->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{!! url('admin/' . $runner->id . '/' . $track->id . '/' . $track->pivot->bib . '/get_new_bib') !!}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>&nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now())<a href="{!! url('admin/' . $runner->id . '/' . $track->id . '/' . $track->pivot->bib . '/get_new_bib') !!}">@endif
                            <span class="glyphicon glyphicon-pencil @if($track->engine->event->date <= \Carbon\Carbon::now()) text-muted @endif"></span>
                        @if($track->engine->event->date > \Carbon\Carbon::now())</a>@endif&nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now())<a href="{!! url('admin/' . $runner->id . '/' . $track->id . '/' . $track->pivot->bib . '/get_new_bib') !!}">@endif
                            <span class="glyphicon glyphicon-repeat @if($track->engine->event->date <= \Carbon\Carbon::now()) text-muted @endif"></span>
                        @if($track->engine->event->date > \Carbon\Carbon::now())</a>@endif&nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now())<a href="{!! url('admin/' . $runner->id . '/' . $track->id . '/' . $track->pivot->bib . '/get_new_bib') !!}">@endif
                            <span class="glyphicon glyphicon-random @if($track->engine->event->date <= \Carbon\Carbon::now()) text-muted @endif"></span>
                        @if($track->engine->event->date > \Carbon\Carbon::now())</a>@endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Apellidos</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->name_last }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Nombres</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->name_first }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Género</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->gender }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">DOB</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->dob }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Documento</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->doc_type }} {{ $runner->doc_num }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Correo</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value"><a href="{{ $runner->mail }}">{{ $runner->mail }}</a></span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Teléfono</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->telephone }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Móvil</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->mobile }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">País</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->country }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Departamento</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->state }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Provincia</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->province }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Distrito</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->city }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">G. Sanguíneo</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->blood }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-2 col-lg-offset-3">--}}
            {{--<span class="model-view-key">Alergias</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3">--}}
            {{--<span class="model-view-value">{{ $runner->allergies }}</span>--}}
        {{--</div>--}}


        {{--<div class="col-lg-5 col-lg-offset-3">--}}
            {{--{!! Form::open(['url' => 'admin/runner/' . $runner->id . '/edit', 'method' => 'get']) !!}--}}
            {{--<div class="form-group">{!! Form::submit('Editar', ['class' => 'form-control btn btn-primary']) !!}</div>--}}
            {{--<div class="form-group">{!! Form::button('Nueva búsqueda', ['class' => 'form-control btn btn-warning new_search_button']) !!}</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}


        {{--@foreach($runner->tracks as $track)--}}
            {{--<div class="container"><div class="row">--}}
                    {{--<div class="col-lg-3 col-lg-offset-2">{{ $track->engine->event->name }} {{ $track->engine->event->date->year }}</div>--}}
                    {{--<div class="col-lg-2">{{ $track->name }}</div>--}}
                    {{--<div class="col-lg-1">{{ $track->pivot->bib }}</div>--}}
                    {{--<div class="col-lg-2"><a href="{!! url('admin/' . $runner->id . '/' . $track->id . '/' . $track->pivot->bib . '/get_new_bib') !!}">NEW BIB</a></div>--}}
                    {{--<div><a href="#">Track</a></div>--}}
                {{--</div></div>--}}
        {{--@endforeach--}}



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
