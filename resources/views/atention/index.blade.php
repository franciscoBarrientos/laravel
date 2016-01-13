@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div id="tableUser" class="table-responsive">
        <table class="table">
            <thead>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Descripción</th>
                <th colspan="2">Acciones</th>
            </thead>

            @foreach($atentions as $atention)
            <tbody>
                <td>{{$client->name}}</td>
                <td>{{$pet->name}}</td>
                <td>{{$atention->description}}</td>
<!--                <td>
                    {!!link_to_route('usuario.edit', $title = ' Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['usuario.destroy',$user->id], 'method'=>'DELETE'])!!}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                    {!!Form::close()!!}
                </td> -->
            </tbody>
            @endforeach
        </table>
        <div>{!! $atentions->render() !!}</div>
    </div>
@endsection