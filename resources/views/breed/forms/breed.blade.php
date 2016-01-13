    </br>
    <div class="form-group">
        {!!Form::label('name', 'Raza:')!!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('species_id', 'Especie:')!!}
        {!!Form::select('species_id',$listSpecies, $species_id, ['class'=>'form-control']) !!}
    </div>
    @section('scripts')
        <!-- JQueryUI 1.11.4 -->
        {!!Html::script('js/jquery-ui.min.js')!!}

        <!-- DatePicker -->
        {!!Html::script('js/jquery-datepicker.js')!!}
    @endsection