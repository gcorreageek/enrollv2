@extends('backend')




@section('content')

    <h4>{{ $runner->name_last }}, {{ $runner->name_first }} / {{ $track->engine->event->name }} {{ $track->engine->event->date->year }} / {{ $track->name }}</h4>

    <div class="row">
        <div class="col-md-5">
            <h3>Inscripción</h3>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Inscripción</td>
                    <td>
                        @if($subscription->enrolled == 0)
                            INCONCLUSA
                        @endif
                        @if($subscription->enrolled == 1)
                            CORRECTA
                        @endif
                        @if($subscription->enrolled == 2)
                            RECHAZADA
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>
                        @if($subscription->status == 'ok')
                            ACTIVA
                        @endif

                        @if($subscription->status == 'deleted')
                            ANULADA
                        @endif

                        @if($subscription->status == 'reviewTrack')
                            REASIGNAR TRACK
                        @endif

                        @if($subscription->status == 'reviewSize')
                            REASIGNAR TALLA
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>BIB</td>
                    <td>{{ $subscription->bib }}</td>
                </tr>
                @if($subscription->transaction_id > 0)
                    <tr>
                        <td>Transacción</td>
                        <td>{{ $subscription->transaction_id }}</td>
                    </tr>
                @else
                    <tr>
                        <td>Código</td>
                        <td>{{ $subscription->code_id }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Categoría</td>
                    <td>
                        @if(is_null($track->categories()->find($subscription->category_id)->description))
                            @if($track->engine->assign_method == 'onYear')
                                {{ $track->categories()->find($subscription->category_id)->max }} - {{ $track->categories()->find($subscription->category_id)->min }}
                            @else
                                {{ $track->categories()->find($subscription->category_id)->min }} - {{ $track->categories()->find($subscription->category_id)->max }}
                            @endif
                        @else
                            $track->categories()->find($subscription->category_id)->description
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Talla</td>
                    <td>{{ $track->garment->sizes()->find($subscription->size_id)->name_long }}</td>
                </tr>
                <tr>
                    <td>Texto en dorsal</td>
                    <td>{{ $subscription->nickname }}</td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td>{{ $subscription->comment }}</td>
                </tr>
                <tr>
                    <td>Fecha inscripción</td>
                    <td>{{ $subscription->created_at }}</td>
                </tr>
                <tr>
                    <td>Última modificación</td>
                    <td>{{ $subscription->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-7">
            <h3>Contacto de Emergencia</h3>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Contacto</td>
                    <td>{{ $subscription->relative_name }} ({{ $subscription->relative_relationship }})</td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td>{{ $subscription->relative_phone }}</td>
                </tr>
                </tbody>
            </table>

            @if($track->starting_corrals == true)
                <h3>Información para corrales de partida</h3>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Tiempo estimado</td>
                        <td>{{ $subscription->time_goal }}</td>
                    </tr>
                    <tr>
                        <td>Mejor tiempo</td>
                        <td>{{ $subscription->time_best }}</td>
                    </tr>
                    <tr>
                        <td>Evento</td>
                        <td>{{ $subscription->event_name }}</td>
                    </tr>
                    <tr>
                        <td>URL evento</td>
                        <td>{{ $subscription->event_url }}</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <h4>Corrales de partida deshabilitados para este track</h4>
            @endif

            <h3>Historial</h3>
            <p>{!! $subscription->change_log !!}</p>

        </div>
    </div>


@endsection