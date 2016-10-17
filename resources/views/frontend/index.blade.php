@extends("frontend")

@section("content")

<div class="container">
    @foreach($events as $event)
        <div class="row">
            <div class="col-lg-3">{{ $event->name }}</div>
            <div class="col-lg-3">{{ $event->city }}</div>
            <div class="col-lg-3">{{ $event->date }}</div>
            <div class="col-lg-3"><a href="{{ url($event->prefix) }}">Inscripciones</a></div>
        </div>
    @endforeach
</div>
@endsection