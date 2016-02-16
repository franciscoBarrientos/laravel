@extends('layouts.principal')
@section('content')
@include('alerts.message')
<div class="row">
    <div class="col-sm-9">
        <h2 class="page-header">Tipos de Alerta</h2>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-sm-3 page-header">
        <!-- Buscador -->
        {!! Form::open (['route' => 'alertType.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
        <div class="input-group">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Buscar tipo alerta', 'aria-describedby'=>'search']) !!}
                        <span class="input-group-addon" id="search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                        </span>
        </div>
        {!! Form::close() !!}
        <!-- Fin buscador -->
    </div>
</div>
<div>
    <a href="/alertType/create" class="btn btn-success">
        <i class="fa fa-plus"></i> Crear
    </a>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <th>Título</th>
            <th>Icono</th>
            <th>Color</th>
            <th colspan="2">Acciones</th>
        </thead>
        @foreach($alertTypes as $alertType)
        <tbody>
        <td>{{$alertType->title}}</td>
        <td><i class="fa {{\Veterinaria\FontAwesome::find($alertType->font_awesome_id)->font}}"></i></td>
        <td>{{\Veterinaria\Http\Controllers\UtilsController::getColorName($alertType->color)}}</td>
        <td>
            {!!link_to_route('alertType.edit', $title = ' Editar', $parameters = [$alertType->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
        </td>
        <td>
            <button data-toggle="modal" data-target="#alertType{{$alertType->id}}" class="btn btn-danger">
                <i class="fa fa-minus-circle"></i> Eliminar
            </button>
            @include('alertType.forms.confirm')
        </td>
        </tbody>
        @endforeach
    </table>
    <div>{!! $alertTypes->render() !!}</div>
</div>
@endsection