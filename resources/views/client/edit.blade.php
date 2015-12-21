@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
            @include('client.forms.client')
            <a href="{{ route('pet.create', $client->id) }}" class="btn btn-primary">
                <span aria-hidden="true">
                    Agregar mascota
                </span>
            </a>
            </br></br></br>
            <table class="table">
                <thead>
                <th>Mascota</th>
                <th>Sexo</th>
                <th colspan="2">Acciones</th>
                </thead>

                @foreach($pets as $pet)
                <tbody>
                <td>{{$pet->name}}</td>
                <td>{{$pet->sex}}</td>
                <td>
                    {!!link_to_route('pet.edit', $title = ' Editar', $parameters = $pet->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['pet.destroy',$pet->id], 'method'=>'DELETE'])!!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-user-times"></i> Eliminar
                    </button>
                    {!!Form::close()!!}
                </td>
                </tbody>
                @endforeach
            </table>
            </br></br></br>
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
            <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
        {!!Form::close()!!}
    @endsection