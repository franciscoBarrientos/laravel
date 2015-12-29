@extends('layouts.principal')
@section('content')
@include('alerts.message')
    <div id="tablePet" class="table-responsive">
        <table class="table">
            <thead>
            <th>Mascota</th>
            <th>Sexo</th>
            <th>Especie</th>
            <th colspan="2">Acciones</th>
            </thead>

            @foreach($pets as $pet)
            <tbody>
            <td>{{$pet->name}}</td>
            <td>{{$pet->sex}}</td>
            <td>{{$pet->species_id}}</td>
            <td>
                {!!link_to_route('pet.editPetByClient', $title = ' Editar', $parameters = [$client->id, $pet->id], $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                <a href="{{ route('pet.destroy', $pet->id) }}" class="btn btn-danger">
                    <i class="fa fa-user-times"></i>Eliminar</a>
            </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $pets->render() !!}</div>
        <a href="{{ route('pet.createpet', $client->id) }}" class="btn btn-primary">
                <span aria-hidden="true">
                    Agregar mascota
                </span>
        </a>
        <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
    </div>
@endsection