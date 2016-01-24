<div class="form-group">
    {!!Form::label('description','Descripción:')!!}
    {!!Form::text('description',null,['class'=>'form-control','placeholder'=>'Ingrese la descripción de la alerta.'])!!}
</div>
<div class="form-group">
    {!!Form::label('alerts_type_id', 'Tipo de alerta:')!!}
    {!!Form::select('alerts_type_id',$alertsType,null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('date', 'Fecha y hora:')!!}
    <div class='input-group date' id='calendarAlert'>
        {!!Form::text('date', null, ['class'=>'form-control']) !!}
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
    </div>
</div>

{!!Form::hidden('pets_id',$pet->id)!!}
@section('scripts')
    <!-- Moment -->
    {!!Html::script('bower_components/moment/min/moment.min.js')!!}
    {!!Html::script('bower_components/moment/min/locales.min.js')!!}

    <!-- Bootstrap-datetimepicker -->
    {!!Html::script('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')!!}
    {!!Html::style('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')!!}

    <!-- Custom Calendar -->
    {!!Html::script('js/calendar.js')!!}
@endsection
