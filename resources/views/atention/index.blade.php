@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Atenciones de {{$pet->name}}</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div>
        {!!link_to_route('atention.add', $title = ' Crear Atención', $parameters = [$pet->id], $attributes = ['class'=>'btn btn-success icon-add'])!!}
        <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Paciente</th>
                <th>Fecha</th>
                <th colspan="2">Acciones</th>
            </thead>

            @foreach($atentions as $atention)
            <?php
                $pet = \Veterinaria\Pet::find($atention->pet_id);
            ?>
            <tbody>
                <td>{{$pet->name}}</td>
                <td>{{$atention->created_at->format('Y/m/d')}}</td>
                <td>
                    <button class="btn btn-success">
                        <i class="fa fa-search"></i> Ver Detalles
                    </button>
                </td>
                <td>
                    {!!link_to_route('atention.edit', $title = ' Editar', $parameters = $atention->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $atentions->render() !!}</div>
    </div>
@endsection