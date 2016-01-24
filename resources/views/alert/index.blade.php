@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Alertas de {{$pet->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div>
            {!!link_to_route('alert.add', $title = ' Crear Alerta', $parameters = $pet->id, $attributes = ['class'=>'btn btn-success icon-add'])!!}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Tipo de alerta</th>
                    <th colspan="2">Acciones</th>
                </thead>

                @foreach($alerts as $alert)
                <tbody>
                <td>{{$alert->description}}</td>
                <td>{{$alert->date}}</td>
                <td>{{\Veterinaria\AlertType::find($alert->alerts_type_id)->title}}</td>
                <td>
                    {!!link_to_route('alert.edit', $title = ' Editar', $parameters = [$alert->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    <button data-toggle="modal" data-target="#myModal{{$alert->id}}" class="btn btn-danger">
                        <i class="fa fa-minus-circle"></i> Eliminar
                    </button>
                    @include('alert.forms.confirm')
                </td>
                </tbody>
                @endforeach
            </table>
            <div>{!! $alerts->render() !!}</div>
        </div>
        @endsection