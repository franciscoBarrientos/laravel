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
        {!!link_to_route('atention.add', $title = ' Crear Atención', $parameters = $pet->id, $attributes = ['class'=>'btn btn-success icon-add'])!!}
        <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Tipo de Atención</th>
                <th colspan="2">Acciones</th>
            </thead>

            @foreach($atentions as $atention)
            <tbody>
                <td>{{$atention->created_at->format('Y/m/d')}}</td>
                <td>{{\Veterinaria\AtentionType::find($atention->atentions_type_id)->description}}</td>
                <td>
                    <button data-toggle="modal" data-target="#info{{$atention->id}}" class="btn btn-default">
                        <i class="fa fa-eye"></i> Ver Detalles
                    </button>
                    @include('atention.forms.detail')
                </td>
                @if($atention->prescription != null)
                <td>
                    {!!link_to_route('atention.pdf', $title = ' Receta', $parameters = $atention->id, $attributes = ['class'=>'btn btn-success icon-pdf'])!!}
                </td>
                @else
                <td></td>
                @endif
                <td>
                    {!!link_to_route('ticket.pdf', $title = ' Boleta', $parameters = $atention->ticket_id, $attributes = ['class'=>'btn btn-primary icon-pdf'])!!}
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