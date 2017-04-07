@extends('backend')
@inject("documents", "App\Http\Utilities\Document")
@inject("countries", "App\Http\Utilities\Country")
@inject("states", "App\Http\Utilities\State")
@inject("provinces", "App\Http\Utilities\Province")
@inject("cities", "App\Http\Utilities\City")
@inject("bloods", "App\Http\Utilities\Blood")
@inject("relationships", "App\Http\Utilities\Relationship")




@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            {!! Form::model($options) !!}

            @include('partials.subscription_form')

            <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
