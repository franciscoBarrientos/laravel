@extends('layouts.principal')
@section('content')
@include('alerts.message')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Mascotas de {{$client->name}} {{$client->lastname}}</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div id="tablePet" class="table-responsive">
        <div>
            <a href="{{ route('pet.createpet', $client->id) }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar mascota</a>
            <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
        </div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th colspan="4">Acciones</th>
            </thead>

            @foreach($pets as $pet)
            <tbody>
                <td>{{$pet->name}}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#information{{$pet->id}}">
                        <i class="fa fa-info-circle"></i> Información
                    </button>
                    <?php $date = Veterinaria\Http\Controllers\UtilsController::calculateAge($pet->birth_date); ?>
                    @include('pet.forms.information')
                </td>
                <td>
                    {!!link_to_route('atention.add', $title = ' Crear Atención', $parameters = [$pet->id], $attributes = ['class'=>'btn btn-success icon-add'])!!}
                </td>
                <td>
                    {!!link_to_route('atention.indexByPetId', $title = ' Atenciones', $parameters = [$pet->id], $attributes = ['class'=>'btn btn-default icon-eye'])!!}
                </td>
                <td>
                    {!!link_to_route('pet.edit', $title = ' Editar', $parameters = $pet->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$pet->id}}">
                        <i class="fa fa-user-times"></i> Eliminar
                    </button>
                    @include('pet.forms.confirm')
                </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $pets->render() !!}</div>
    </div>
@endsection