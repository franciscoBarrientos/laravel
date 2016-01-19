    {!!Form::hidden('client_id', $client -> id,['class'=>'form-control', 'parameters' => 'id'])!!}
    <div class="form-group">
        {!!Form::label('name', 'Nombre:')!!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre mascota'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('birthDate', 'Fecha nacimiento:')!!}
        {!!Form::text('birthDate', $birthDate, ['id' => 'datepicker', 'class'=>'form-control']) !!}
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
    @endif
    @if(!isset($specie_id))
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
    @endif
    @if(!isset($breedsList))
    <div class="form-group">
        {!!Form::label('breed_id', 'Raza:')!!}
        {!!Form::select('breed_id',['-1'=>'Selecciona una Raza'],null,['class'=>'form-control','id'=>'breed']) !!}
    </div>
    @endif
    @section('scripts')
        <!-- utils -->
        {!!Html::script('js/utils.js')!!}

        <!-- JQueryUI 1.11.4 -->
        {!!Html::script('js/jquery-ui-1.11.4/jquery-ui.min.js')!!}

        <!-- DatePicker -->
        {!!Html::script('js/jquery-datepicker.js')!!}

        <!-- Ajax -->
        {!!Html::script('js/ajaxPet.js')!!}

        @if(!isset($breedsList))
            <script>create(true);</script>
        @endif
        @if(isset($breedsList))
            <script>create(false);</script>
        @endif
    @endsection