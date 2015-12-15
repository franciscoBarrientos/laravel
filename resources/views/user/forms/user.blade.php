<div class="form-group">
    {!!Form::label('Usuario:')!!}
    {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('Email:')!!}
    {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Email'])!!}
</div>
<div class="form-group">
    {!!Form::label('Contraseña:')!!}
    {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Password'])!!}
</div>