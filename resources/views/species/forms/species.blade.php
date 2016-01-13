    </br>
    <div class="form-group">
        {!!Form::label('species', 'Especie:')!!}
        {!!Form::text('species', null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
    </div>
    </br></br>
    @section('scripts')
        <!-- JQueryUI 1.11.4 -->
        {!!Html::script('js/jquery-ui.min.js')!!}

        <!-- DatePicker -->
        {!!Html::script('js/jquery-datepicker.js')!!}
    @endsection