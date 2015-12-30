@include('alerts.errors')
<div class="form-group">
    {!!Form::label('fancy_name','Nombre de fantasía:')!!}
    {!!Form::text('fancy_name', null,['class'=>'form-control', 'placeholder'=>'Nombre de fantasía'])!!}
</div>
<div class="form-group">
    {!!Form::label('business_name','Razón Social:')!!}
    {!!Form::text('business_name', null,['class'=>'form-control', 'placeholder'=>'Razón social'])!!}
</div>
<div class="form-group">
    {!!Form::label('activity','Giro:')!!}
    {!!Form::text('activity', null,['class'=>'form-control', 'placeholder'=>'Giro'])!!}
</div>
<div class="form-group">
    <div class="table-responsive border-none">
        <table class="container-width">
            <tr>
                <td class="width-rut">
                    {!!Form::label('rut','RUT:')!!}
                    {!!Form::text('rut', null,['class'=>'form-control', 'placeholder'=>'11111111', 'maxlength'=>'8'])!!}
                </td>
                <td class="text-center width-space">-</td>
                <td class="width-dv">
                    {!!Form::label('verifying_digit','DV:')!!}
                    {!!Form::text('verifying_digit', null,['class'=>'form-control', 'placeholder'=>'1', 'maxlength'=>'1'])!!}
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="form-group">
    {!!Form::label('name','Nombre Contacto:')!!}
    {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre Contacto'])!!}
</div>
<div class="form-group">
    {!!Form::label('email','Email Contacto:')!!}
    {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'example@example.com'])!!}
</div>
<div class="form-group">
    {!!Form::label('phone','Teléfono Contacto:')!!}
    {!!Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'9 9999 9999'])!!}
</div>