@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-sm-9">
                <h2 class="page-header">Tipos de Atención</h2>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-3 page-header">
                <!-- Buscador -->
                {!! Form::open (['route' => 'atentionType.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
                <div class="input-group">
                    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=>'Buscar tipo de atención', 'aria-describedby'=>'search']) !!}
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
            <a href="/atentionType/create" class="btn btn-success">
                <i class="fa fa-plus"></i> Crear
            </a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>Tipo de Atención</th>
                <th>Precio</th>
                <th colspan="2">Acciones</th>
                </thead>

                @foreach($atentionsType as $atentionType)
                <tbody>
                <td>{{$atentionType->description}}</td>
                <td>{{$atentionType->price}}</td>
                <td>
                    {!!link_to_route('atentionType.edit', $title = ' Editar', $parameters = [$atentionType->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    <button data-toggle="modal" data-target="#myModal{{$atentionType->id}}" class="btn btn-danger">
                        <i class="fa fa-minus-circle"></i> Eliminar
                    </button>
                    @include('atentionType.forms.confirm')
                </td>
                </tbody>
                @endforeach
            </table>
            <div>{!! $atentionsType->render() !!}</div>
        </div>
    @endsection