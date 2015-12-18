@extends('layouts.principal')
@section('content')
    @include('alerts.message')

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
                    {!!link_to_route('usuario.edit', $title = ' Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['usuario.destroy',$user->id], 'method'=>'DELETE'])!!}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                    {!!Form::close()!!}
                </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $users->render() !!}</div>
    </div>
@endsection