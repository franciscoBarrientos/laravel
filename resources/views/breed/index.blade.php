@extends('layouts.principal')
@section('content')
@include('alerts.message')
    <div class="row">
        <div class="col-sm-9">
            <h2 class="page-header">Razas</h2>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-sm-3 page-header">
            <!-- Buscador -->
            {!! Form::open (['route' => 'breed.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
            <div class="input-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Buscar raza', 'aria-describedby'=>'search']) !!}
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
        <a href="{{ route('breed.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar raza</a>
        <a href="{{ route('home.index') }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
    </div>
    <hr class="intro-divider"/>
    <div id="tableBreed" class="table-responsive">
        <table class="table">
            <thead>
            <th>Raza</th>
            <th>Especie</th>
            <th colspan="2">Acciones</th>
            </thead>
            @foreach($breeds as $breed)
            <tbody>
            <td>{{$breed->name}}</td>
            <td>{{\Veterinaria\Species::find($breed->species_id)->species}}</td>
            <td>
                {!!link_to_route('breed.edit', $title = ' Editar', $parameters = [$breed->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
            </td>
            <td>
                <a href="{{ route('breed.destroy', $breed->id) }}" class="btn btn-danger">
                    <i class="fa fa-user-times"></i> Eliminar
                </a>
            </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $breeds->render() !!}</div>
    </div>
@endsection