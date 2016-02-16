@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div class="row">
        <div class="col-sm-9">
            <h2 class="page-header">Usuarios</h2>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-sm-3 page-header">
            <!-- Buscador -->
            {!! Form::open (['route' => 'user.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
            <div class="input-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Buscar usuario', 'aria-describedby'=>'search']) !!}
                        <span class="input-group-addon" id="search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                        </span>
            </div>
            {!! Form::close() !!}
            <!-- Fin buscador -->
        </div>
    </div>
    <div id="tableUser" class="table-responsive">
        <table class="table">
            <thead>
                <th>Usuario</th>
                <th>Correo</th>
                <th colspan="2">Acciones</th>
            </thead>

            @foreach($users as $user)
            <tbody>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {!!link_to_route('user.edit', $title = ' Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['user.destroy',$user->id], 'method'=>'DELETE'])!!}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$user->id}}">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        @include('user.forms.confirm')
                    {!!Form::close()!!}
                </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $users->render() !!}</div>
    </div>
@endsection