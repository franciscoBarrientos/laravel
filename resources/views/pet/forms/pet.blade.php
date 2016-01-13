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
    <div class="form-group">
        {!!Form::label('breed_id', 'Raza:')!!}
        {!!Form::select('breed_id',$breedsList, $breed_id, ['class'=>'form-control']) !!}
    </div>
    @section('scripts')
        <!-- JQueryUI 1.11.4 -->
        {!!Html::script('js/jquery-ui.min.js')!!}

        <!-- DatePicker -->
        {!!Html::script('js/jquery-datepicker.js')!!}
    @endsection