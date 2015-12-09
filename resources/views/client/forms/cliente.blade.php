<div class="form-group">
    {!!Form::label('Nombre:')!!}
    {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Apellido paterno:')!!}
    {!!Form::text('lastNamePat', null,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Apellido materno:')!!}
    {!!Form::text('lastNameMat', null,['class'=>'form-control', 'placeholder'=>'Apellido materno de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('Rut:')!!}
    {!!Form::text('rut', null,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1'])!!}
</div>
<div class="form-group">
    {!!Form::label('Dirección:')!!}
    {!!Form::text('direction', null,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706'])!!}
</div>
<div class="form-group">
    {!!Form::label('Teléfono celular:')!!}
    {!!Form::text('cellphone', null,['class'=>'form-control', 'maxlength'=>'8', 'placeholder'=>'8123XXXX'])!!}
</div>
<div class="form-group">
    {!!Form::label('Teléfono fijo:')!!}
    {!!Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'02-22233114'])!!}
</div>