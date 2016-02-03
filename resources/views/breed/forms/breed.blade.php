    </br>
    <div class="form-group">
        {!!Form::label('name', 'Raza:')!!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('species_id', 'Especie:')!!}
        {!!Form::select('species_id',$listSpecies, $species_id, ['class'=>'form-control']) !!}
    </div>