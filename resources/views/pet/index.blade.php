@extends('layouts.principal')
@section('content')
@include('alerts.message')
    </br>
    <div id="tablePet" class="table-responsive">
        <div class="float-left">
            <a href="{{ route('pet.createpet', $client->id) }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar mascota</a>
            <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
        </div>
        </br>
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
            @if ($pet->sex == 1)
                <td>MACHO</td>
            @else
                <td>HEMBRA</td>
            @endif
            @foreach($breedsList as $breed)
                @if ($pet->breed_id == $breed->id)
                    <td>{{$breed->name}}</td>
                @endif
            @endforeach
            <td>
                {!!link_to_route('pet.editPetByClient', $title = ' Editar', $parameters = [$client->id, $pet->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                <a href="{{ route('pet.destroy', $pet->id) }}" class="btn btn-danger">
                    <i class="fa fa-user-times"></i>Eliminar</a>
            </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $pets->render() !!}</div>
    </div>
@endsection