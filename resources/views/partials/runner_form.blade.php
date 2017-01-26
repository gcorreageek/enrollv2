
        <div class="form-group">
            {!! Form::label('name_last', 'Apellidos:', ['class' => 'sr-only']) !!}
            {!! Form::text('name_last', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name_first', 'Nombres:', ['class' => 'sr-only']) !!}
            {!! Form::text('name_first', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
        </div>

        @if($edit_mode == false)
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-xs-6 gender_container">
                        {!! Form::label('verbose_gender', 'Género:', ['class' => 'sr-only']) !!}
                        {!! Form::text('verbose_gender', \App\Runner::verboseGender($gender), ['class' => 'form-control', 'placeholder' => 'Género', 'disabled']) !!}
                        {!! Form::hidden('gender', $gender, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-xs-6 dob_container">
                        {!! Form::label('dob_dummy', 'Fecha de nacimiento:', ['class' => 'sr-only']) !!}
                        {!! Form::text('dob_dummy', $dob->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'Fecha de nacimiento', 'disabled']) !!}
                        {!! Form::hidden('dob', $dob->format('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {!! Form::label('gender', 'Género:', ['class' => 'sr-only']) !!}
                {!! Form::select('gender', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un género']) !!}
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-xs-4 dob_day_selector_container">
                        {!! Form::label('dob_day', 'Día:', ['class' => 'sr-only']) !!}
                        {!! Form::selectRange('dob_day', 1, 31, $runner->dob->day, ['class' => 'form-control dob_component dob_day', 'placeholder' => 'Día'])!!}
                    </div>

                    <div class="form-group col-xs-4 dob_month_selector_container">
                        {!! Form::label('dob_month', 'Mes:', ['class' => 'sr-only']) !!}
                        {!! Form::selectRange('dob_month', 1, 12, $runner->dob->month, ['class' => 'form-control dob_component dob_month', 'placeholder' => 'Mes'])!!}
                    </div>

                    <div class="form-group col-xs-4 dob_year_selector_container">
                        {!! Form::label('dob_year', 'Año:', ['class' => 'sr-only']) !!}
                        {!! Form::selectRange('dob_year', 2015, 1900, $runner->dob->year, ['class' => 'form-control dob_component dob_year', 'placeholder' => 'Año']) !!}
                    </div>
                    {!! Form::hidden('dob', $runner->dob->format('Y-m-d'), ['class' => 'form-control dob']) !!}
                </div>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-xs-6 doc_type_container">
                    @if($edit_mode == false)
                        {!! Form::label('doc_type_dummy', 'Tipo documento:', ['class' => 'sr-only']) !!}
                        {!! Form::text('doc_type_dummy', $doc_type, ['class' => 'form-control', 'placeholder' => 'Tipo documento', 'disabled']) !!}
                        {!! Form::hidden('doc_type', $doc_type, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::label('doc_type', 'Tipo documento:', ['class' => 'sr-only']) !!}
                        {!! Form::select('doc_type', $documents::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de documento']) !!}
                    @endif

                </div>

                <div class="form-group col-xs-6 doc_num_container">
                    @if($edit_mode == false)
                        {!! Form::label('doc_num_dummy', 'Número documento:', ['class' => 'sr-only']) !!}
                        {!! Form::text('doc_num_dummy', strtoupper($doc_num), ['class' => 'form-control', 'placeholder' => 'Número documento', 'disabled']) !!}
                        {!! Form::hidden('doc_num', $doc_num, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::label('doc_num', 'Número documento:', ['class' => 'sr-only']) !!}
                        {!! Form::text('doc_num', null, ['class' => 'form-control', 'placeholder' => 'Número de documento']) !!}
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mail', 'Correo electrónico:', ['class' => 'sr-only']) !!}
            {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico']) !!}
        </div>

        @if($edit_mode == false)
        <div class="form-group">
            {!! Form::label('mail_confirmation', 'Confirmación correo electrónico:', ['class' => 'sr-only']) !!}
            {!! Form::text('mail_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Reingrese correo electrónico']) !!}
        </div>
        @endif

        <div class="form-group">
            {!! Form::label('telephone', 'Teléfono:', ['class' => 'sr-only']) !!}
            {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Celular:', ['class' => 'sr-only']) !!}
            {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Celular']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country', 'País:', ['class' => 'sr-only']) !!}
            @if($edit_mode == false)
                {!! Form::select('country', $countries::all(), $defaultCountry, ['class' => 'form-control', 'placeholder' => 'Seleccione su país']) !!}
            @else
                {!! Form::select('country', $countries::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su país']) !!}
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado / Departamento:', ['class' => 'sr-only']) !!}
            @if($edit_mode == false)
                {!! Form::select('state', $states::all(), $defaultState, ['class' => 'form-control', 'placeholder' => 'Seleccione su estado / departamento']) !!}
            @else
                {!! Form::select('state', $states::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su estado / departamento']) !!}
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('province', 'Provincia:', ['class' => 'sr-only']) !!}
            @if($edit_mode == false)
                {!! Form::select('province', $provinces::all(), $defaultProvince, ['class' => 'form-control', 'placeholder' => 'Seleccione su provincia']) !!}
            @else
                {!! Form::select('province', $provinces::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su provincia']) !!}
            @endif

        </div>

        <div class="form-group">
            {!! Form::label('city', 'Ciudad / Distrito:', ['class' => 'sr-only']) !!}
            {!! Form::select('city', $cities::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su ciudad / distrito']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('blood', 'Grupo sanguíneo:', ['class' => 'sr-only']) !!}
            {!! Form::select('blood', $bloods::all(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione su grupo sanguíneo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('allergies', 'Alergias:', ['class' => 'sr-only']) !!}
            {!! Form::textarea('allergies', null, ['class' => 'form-control', 'placeholder' => 'Alergias']) !!}
        </div>
