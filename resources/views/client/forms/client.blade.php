<div class="form-group">
    {!!Form::label('name','Nombre:')!!}
    {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('lastname','Apellido:')!!}
    {!!Form::text('lastname', null,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente'])!!}
</div>
<div class="form-group">
    {!!Form::label('rut','Rut:')!!}
    {!!Form::text('rut', null,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1'])!!}
</div>
<div class="form-group">
    {!!Form::label('address','Dirección:')!!}
    {!!Form::text('address', null,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706'])!!}
</div>
<div class="form-group">
    {!!Form::label('email','Email:')!!}
    {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'prueba@prueba.com'])!!}
</div>
<div class="form-group">
    {!!Form::label('cellphone','Teléfono celular:')!!}
    {!!Form::text('cellphone', null,['class'=>'form-control', 'maxlength'=>'15', 'placeholder'=>'+56 9 8765 4321'])!!}
</div>
<div class="form-group">
    {!!Form::label('phone','Teléfono fijo:')!!}
    {!!Form::text('phone',null,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'02 2876 5432'])!!}
</div>