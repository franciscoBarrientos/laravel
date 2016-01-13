    <div class="form-inline">
        <div class="form-group col-xs-6 col-sm-4">
            {!!Form::label('client','Cliente:', ['class'=>'col-md-4'])!!}
            {!!Form::text('client', null,['class'=>'form-control col-md-4', 'disabled'=>'true', 'placeholder'=>'Cliente'])!!}
        </div>
        <div class="form-group col-xs-6 col-sm-4">
            {!!Form::label('rut','Rut:' , ['class'=>'col-md-4'])!!}
            {!!Form::text('rut', null,['id'=>'rut', 'class'=>'form-control col-md-4', 'placeholder'=>'Rut'])!!}
        </div>
        <div class="form-group col-xs-6 col-sm-4">
            <a href="/findpets" class="btn btn-info" title="Volver">cualuq</span></a>
        </div>
    </div>
    </br></br></br>
    <div class="form-inline">
        <div class="form-group col-xs-6 col-sm-4">
            {!!Form::label('name','Mascota:', ['class'=>'col-md-4'])!!}
            {!!Form::text('name', null,['class'=>'form-control col-md-4', 'disabled'=>'true', 'placeholder'=>'Nombre'])!!}
        </div>
        <div class="form-group col-xs-6 col-sm-4">
            {!!Form::label('birthDate','Fecha nacimiento:', ['class'=>'col-md-4'])!!}
            {!!Form::password('birthDate',['class'=>'form-control col-md-4', 'disabled'=>'true', 'placeholder'=>'1-1-1900'])!!}
        </div>
        <div class="form-group col-xs-6 col-sm-4">
            {!!Form::label('species_id', 'Especie:')!!}
            {!!Form::select('species_id',$listSpecies, null,  ['disabled'=>'true']) !!}
        </div>
    </div>
    </br></br></br>