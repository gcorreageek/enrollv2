@if($errors->any())
    <div class="alert alert-danger" id="validation_errors">
        <h4 class="text-center">Por favor corrija lo siguiente:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif