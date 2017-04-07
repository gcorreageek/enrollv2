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
                    <td>{{ $track->pivot->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{!! url('admin/subscription/' . $runner->id . '/' . $track->id) !!}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>

                        &nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now())
                            <a href="{!! url('admin/subscription/' . $runner->id . '/' . $track->id . '/edit') !!}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @else
                            <span class="glyphicon glyphicon-pencil text-muted"></span>
                        @endif

                        &nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now())
                            <a href="{!! url('admin/subscription/' . $runner->id . '/' . $track->id . '/new_bib') !!}">
                                <span class="glyphicon glyphicon-repeat"></span>
                            </a>
                        @else
                            <span class="glyphicon glyphicon-repeat text-muted"></span>
                        @endif

                        &nbsp;&nbsp;

                        @if($track->engine->event->date > \Carbon\Carbon::now() && $track->engine->event_change != 'notAllowed')
                            <a href="{!! url('admin/subscription/' . $runner->id . '/' . $track->id . '/new_track') !!}">
                                <span class="glyphicon glyphicon-random"></span>
                            </a>
                        @else
                            <span class="glyphicon glyphicon-random text-muted"></span>
                        @endif

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
