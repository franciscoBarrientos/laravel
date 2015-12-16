@extends('layouts.principal')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert"">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="hide">Close</span>
            </button>
            {{Session::get('message')}}
        </div>
    @endif
    <div id="tableUser">
        <table class="table">
            <thead>
                <th>Usuario</th>
                <th colspan="3">Correo</th>
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
    </div>
@endsection