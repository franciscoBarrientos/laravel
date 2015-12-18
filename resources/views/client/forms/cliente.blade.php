<div class="form-group">
    {!!Form::label('Nombre:')!!}
    {!!Form::text('name', $client->client_name,['class'=>'form-control', 'placeholder'=>'Nombre de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Apellido paterno:')!!}
    {!!Form::text('lastNamePat', $client->client_last_name_p,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Apellido materno:')!!}
    {!!Form::text('lastNameMat', $client->client_last_name_m,['class'=>'form-control', 'placeholder'=>'Apellido materno de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Rut:')!!}
    {!!Form::text('rut', $client->client_rut,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1'])!!}
</div>
<div class="form-group">
    {!!Form::label('Dirección:')!!}
    {!!Form::text('direction', $client->client_direction,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706'])!!}
</div>
<div class="form-group">
    {!!Form::label('Teléfono celular:')!!}
    {!!Form::text('cellphone', $client->client_cellphone,['class'=>'form-control', 'maxlength'=>'15', 'placeholder'=>'+56 9 8765 4321'])!!}
</div>
<div class="form-group">
    {!!Form::label('Teléfono fijo:')!!}
    {!!Form::text('phone', $client->client_phone,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'02 2876 5432'])!!}
</div>