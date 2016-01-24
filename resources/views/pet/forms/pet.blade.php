    <div class="form-group">
        {!!Form::label('name', 'Nombre:')!!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre mascota'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('birth_date', 'Fecha nacimiento:')!!}
        <div class='input-group date' id='calendarPet'>
            {!!Form::text('birth_date', null, ['class'=>'form-control']) !!}
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
        </div>
    </div>
    <div class="form-group">
        {!!Form::label('sex', 'Sexo:')!!}
        {!!Form::select('sex',['1' => 'MACHO', '2' => 'HEMBRA'],null,['class'=>'form-control']) !!}
    </div>
    @if(isset($specie_id))
    <div class="form-group">
        {!!Form::label('specie_id', 'Especie:')!!}
        {!!Form::select('specie_id',$species, $specie_id,['class'=>'form-control','id'=>'specie']) !!}
    </div>
    @else
    <div class="form-group">
        {!!Form::label('specie_id', 'Especie:')!!}
        {!!Form::select('specie_id',$species, null,['class'=>'form-control','id'=>'specie']) !!}
    </div>
    @endif
    @if(isset($breedsList))
    <div class="form-group">
        {!!Form::label('breed_id', 'Raza:')!!}
        {!!Form::select('breed_id',$breedsList,null,['class'=>'form-control','id'=>'breed']) !!}
    </div>
    @else
    <div class="form-group">
        {!!Form::label('breed_id', 'Raza:')!!}
        {!!Form::select('breed_id',['-1'=>'Selecciona una Raza'],null,['class'=>'form-control','id'=>'breed']) !!}
    </div>
    @endif
    <div class="form-group">
        {!!Form::label('record_number', 'Número de ficha:')!!}
        @if(isset($number))
        {!!Form::number('record_number',$number,['class'=>'form-control']) !!}
        @else
        {!!Form::number('record_number',null,['class'=>'form-control']) !!}
        @endif
    </div>
    @section('scripts')
        <!-- Moment -->
        {!!Html::script('bower_components/moment/min/moment.min.js')!!}
        {!!Html::script('bower_components/moment/min/locales.min.js')!!}

        <!-- Bootstrap-datetimepicker -->
        {!!Html::script('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')!!}
        {!!Html::style('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')!!}

        <!-- Custom Calendar -->
        {!!Html::script('js/calendar.js')!!}

        <!-- utils -->
        {!!Html::script('js/utils.js')!!}

        <!-- Ajax -->
        {!!Html::script('js/ajaxPet.js')!!}

        @if(!isset($breedsList))
            <script>create(true);</script>
        @endif
        @if(isset($breedsList))
            <script>create(false);</script>
        @endif
    @endsection





