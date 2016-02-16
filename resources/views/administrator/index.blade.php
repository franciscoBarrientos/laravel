@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-sm-9">
                <h2 class="page-header">Administradores</h2>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-3 page-header">
                <!-- Buscador -->
                {!! Form::open (['route' => 'administrator.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Buscar administrador', 'aria-describedby'=>'search']) !!}
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
            <a href="/administrator/create" class="btn btn-success">
                <i class="fa fa-plus"></i> Crear
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Administrador</th>
                    <th colspan="2">Correo</th>
                </tr>
                @foreach($administrators as $administrator)
                <tr>
                    <td>{{ucfirst(strtolower($users->find($administrator->user_id)->name))}}</td>
                    <td>{{$users->find($administrator->user_id)->email}}</td>
                    <td>
                        {!!Form::open(['route'=>['administrator.destroy',$administrator->id], 'method'=>'DELETE'])!!}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$administrator->id}}">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        @include('administrator.forms.confirm')
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </table>
            <div>{!! $administrators->render() !!}</div>
        </div>
    @endsection