@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Boletas Anuladas</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <table class="table">
                <thead>
                <th>Número</th>
                <th>Fecha de creación</th>
                <th>Fecha de eliminación</th>
                <th colspan="3">Acción</th>
                </thead>
                @foreach($tickets as $ticket)
                <tbody>
                <td>{{$ticket->number}}</td>
                <td>{{$ticket->created_at->format('Y/m/d')}}</td>
                <td>{{$ticket->updated_at->format('Y/m/d')}}</td>
                <td>
                    {!!link_to_route('ticket.pdf', $title = ' Descargar', $parameters = $ticket->id, $attributes = ['class'=>'btn btn-primary icon-pdf'])!!}
                </td>
                </tbody>
                @endforeach
            </table>
            {!!$tickets->render()!!}
        </div>
    @endsection