@extends('layouts.principal')
@section('content')
@include('alerts.message')
    <div id="tableBreed" class="table-responsive">
        </br>
        <div class="float-left">
            <a href="{{ route('breed.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar raza</a>
            <a href="{{ route('home.index') }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
        </div>
        </br>
        <table class="table">
            <thead>
            <th>Raza</th>
            <th>Especie</th>
            <th colspan="2">Acciones</th>
            </thead>

            @foreach($breeds as $breed)
            <tbody>
            <td>{{$breed->name}}</td>
            @foreach($speciesList as $species)
                @if ($breed->species_id == $species->id)
                    <td>{{$species->species}}</td>
                @endif
            @endforeach
            <td>
                {!!link_to_route('breed.edit', $title = ' Editar', $parameters = [$breed->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                <a href="{{ route('breed.destroy', $breed->id) }}" class="btn btn-danger">
                    <i class="fa fa-user-times"></i>Eliminar</a>
            </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $breeds->render() !!}</div>
    </div>
@endsection