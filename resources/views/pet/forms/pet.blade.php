    <div class="form-group">
        {!!Form::label('name', 'Nombre:')!!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre mascota'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('birthDate', 'Fecha nacimiento:')!!}
        {!!Form::text('birthDate', null,['class'=>'form-control', 'placeholder'=>'Fecha nacimiento'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('sex', 'Sexo:')!!}
        {!!Form::select('sex',['1' => 'MACHO', '2' => 'HEMBRA'], null) !!}
    </div>
    <div class="form-group">
        {!!Form::label('species_id', 'Especie:')!!}
        {!!Form::select('species_id',$listSpecies, $species_id) !!}
    </div>
