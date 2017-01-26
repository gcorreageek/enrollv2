@extends('backend')

@inject("documents", "App\Http\Utilities\Document")
@inject("countries", "App\Http\Utilities\Country")
@inject("states", "App\Http\Utilities\State")
@inject("provinces", "App\Http\Utilities\Province")
@inject("cities", "App\Http\Utilities\City")
@inject("bloods", "App\Http\Utilities\Blood")

@section("content")


    <div class="col-xs-12">
        @include('frontend.partials.validation_errors')
    </div>


    <div class="col-lg-6 col-lg-offset-3">

        {!! Form::model($runner, ['url' => 'admin/runner/' . $runner->id . '/update']) !!}
        @include('partials.runner_form')
        <div class="form-group">{!! Form::submit('Continuar', ['class' => 'form-control btn btn-primary']) !!}</div>
        <div class="form-group">{!! Form::button('Regresar', ['class' => 'form-control btn btn-danger cancel_button']) !!}</div>
        {!! Form::close() !!}

    </div>

@endsection


@section("script")
    <script>

        $('.dob_component').change(function () {
            $('.dob').val($('.dob_year').val() + '-' + ('00' + $('.dob_month').val()).slice(-2) + '-' + ('00' + $('.dob_day').val()).slice(-2));
        });

        if($('#province').val() != 'LIM'){
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }

        if($('#state').val() != 'LIM'){
            $('#province').prop("selectedIndex", 0);
            $('#province').prop('disabled', true);
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }

        if($('#country').val() != 'pe'){
            $('#state').prop("selectedIndex", 0);
            $('#state').prop('disabled', true);
            $('#province').prop("selectedIndex", 0);
            $('#province').prop('disabled', true);
            $('#city').prop("selectedIndex", 0);
            $('#city').prop('disabled', true);
        }


        $('#country').change(function(){
            if($('#country').val() != 'pe'){
                $('#state').prop('disabled', true);
                $('#state').prop("selectedIndex", 0);
                $('#province').prop('disabled', true);
                $('#province').prop("selectedIndex", 0);
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#state').prop('disabled', false);
            }
        });

        $('#state').change(function(){
            if($('#state').val() != 'LIM'){
                $('#province').prop('disabled', true);
                $('#province').prop("selectedIndex", 0);
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#province').prop('disabled', false);
            }
        });

        $('#province').change(function(){
            if($('#province').val() != 'LIM'){
                $('#city').prop('disabled', true);
                $('#city').prop("selectedIndex", 0);
            }else{
                $('#city').prop('disabled', false);
            }
        });

        $('.cancel_button').on("click", function () {
            {{--window.location = "{{ back() }}";--}}
            parent.history.back();
            return false;
        });

    </script>
@endsection