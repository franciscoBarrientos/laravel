    <?php
        $date2 = date('Y-m-d');
        $diff = abs(strtotime($date2) - strtotime($pet->birth_date));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if($years == 1){$yearAge = 'año';}
        else{$yearAge = 'años';}

        if($months == 1){$monthsAge = 'mes';}
        else{$monthsAge = 'meses';}

        if($days == 1){$daysAge = 'día';}
        else{$daysAge = 'días';}

        $date = $years.' '.$yearAge.' '.$months.' '.$monthsAge.' '.$days.' '.$daysAge;
    ?>
    <div class="col-xs-12">
        <div class="form-group col-xs-6 col-sm-4" style="padding:0;">
            {!!Form::label(null,'Cliente:')!!}
            {{$client->name}}&nbsp;{{$client->lastname}}
        </div>
        <div class="form-group col-xs-6 col-sm-4" style="padding:0;">
            {!!Form::label(null,'Rut:')!!}
            {{$client->rut}}
        </div>
        <div class="form-group col-xs-6 col-sm-4" style="padding:0;">
            {!!Form::label(null,'Fecha:')!!}
            {{date('Y/m/d')}}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group col-xs-3" style="padding:0;">
            {!!Form::label(null,'Nombre:')!!}
            {{$pet->name}}
        </div>
        <div class="form-group col-xs-3" style="padding:0;">
            {!!Form::label(null,'Edad:')!!}
            {{$date}}
        </div>
        <div class="form-group col-xs-3" style="padding:0;">
            {!!Form::label(null,'Especie:')!!}
            {{$specie->species}}
        </div>
        <div class="form-group col-xs-3" style="padding:0;">
            {!!Form::label(null,'Raza:')!!}
            {{$breed->name}}
        </div>
    </div>
    <div class="col-xs-12 form-group">
        {!!Form::label('atentions_type_id','Tipo de Atención:')!!}
        {!!Form::select('atentions_type_id',$atentionsType, null, ['class'=>'form-control']) !!}
        {!!Form::hidden('pet_id',$pet->id, null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!!Form::label('procedure','Procedimiento:')!!}
        </div>
        <div class="form-group">
            {!! Form::textarea('procedure', null,['class'=>'col-xs-12','style'=>'height:100px;','placeholder'=>'Escriba el procedimiento realizado.']) !!}
        </div>
    </div>
    <div class="col-xs-12" style="padding-top:30px;">
        <div class="form-group">
            {!!Form::label('treatment','Tratamiento:')!!}
        </div>
        <div class="form-group">
            {!! Form::textarea('treatment', null,['class'=>'col-xs-12','style'=>'height:100px;','placeholder'=>'Escriba el tratamiento realizado.']) !!}
        </div>
    </div>
    <div class="col-xs-12" style="padding-top:30px;">
        <div class="form-group">
            {!!Form::label('diagnosis','Diagnóstico:')!!}
        </div>
        <div class="form-group">
            {!! Form::textarea('diagnosis', null,['class'=>'col-xs-12','style'=>'height:100px;','placeholder'=>'Escriba el diagnóstico realizado.']) !!}
        </div>
    </div>
    <div class="col-xs-12" style="padding-top:30px;">
        <div class="form-group">
            {!!Form::label('prescription','Receta:')!!}
        </div>
        <div class="form-group">
            {!! Form::textarea('prescription', null,['class'=>'col-xs-12','style'=>'height:100px;','placeholder'=>'Escriba la receta prescrita.']) !!}
        </div>
    </div>
    <div style="padding-bottom:30px;">&nbsp;</div>