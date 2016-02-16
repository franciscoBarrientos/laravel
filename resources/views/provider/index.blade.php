@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-sm-9">
                <h2 class="page-header">Proveedores</h2>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-3 page-header">
                <!-- Buscador -->
                {!! Form::open (['route' => 'provider.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Buscar proveedor', 'aria-describedby'=>'search']) !!}
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
            <table class="table">
                <thead>
                    <th>Nombre de fantasía</th>
                    <th colspan="3">Acciones</th>
                </thead>
                @foreach($providers as $provider)
                <tbody>
                    <td>{{$provider->fancy_name}}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#info{{$provider->id}}">
                            <i class="fa fa-info-circle"></i> Información
                        </button>
                        @include('provider.forms.detail')
                    </td>
                    <td>
                        {!!link_to_route('provider.edit', $title = ' Editar', $parameters = $provider->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$provider->id}}">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        @include('provider.forms.confirm')
                    </td>
                </tbody>
                @endforeach
            </table>
            {!!$providers->render()!!}
        </div>
    @endsection