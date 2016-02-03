<div class="form-group">
    {!!Form::label('title','Título:')!!}
    {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Ingrese el tipo de atención.'])!!}
</div>
<div class="form-group">
    {!!Form::label('color', 'Color:')!!}
    {!!Form::select('color',$color,null,['class'=>'form-control','id'=>'color'])!!}
</div>
<div class="form-group">
    {!!Form::label('font_awesome_id', 'Iconos:')!!}
    <span id="icon">
        @if($icon != null)
            <i class="fa {{\Veterinaria\FontAwesome::find($icon)->font}}"></i>
        @endif
    </span>
    <div>
        <div class="btn btn-default icon-hand" data-toggle="modal" data-target="#chooseIcon"/> Seleccionar Icono</div>
        @include('alertType.forms.font')
    </div>
    {!!Form::hidden('font_awesome_id',$icon,['class'=>'form-control','id'=>'font_awesome_id'])!!}
</div>

@section('scripts')
    <!-- FontAwesome -->
    {!!Html::script('js/changeFontAwesome.js')!!}
@endsection