@extends('layouts.principal')
@section('content')
@include('alerts.message')
<div>
    <table class="table">
        <thead>
        <th>Número</th>
        <th colspan="2">Acción</th>
        </thead>
        @foreach($tickets as $ticket)
        <tbody>
        <td>{{$ticket->number}}</td>
        <td>
            {!!link_to_route('ticket.detail', $title = ' Descargar', $parameters = $ticket->id, $attributes = ['class'=>'btn btn-primary icon-pdf'])!!}
        </td>
        <td>
            {!!Form::open(['route'=>['ticket.destroy',$ticket->id], 'method'=>'DELETE'])!!}
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$ticket->id}}">
                    <i class="fa fa-minus-circle"></i> Anular Boleta
                </button>
                @include('ticket.forms.confirm')
            {!!Form::close()!!}
        </td>
        </tbody>
        @endforeach
    </table>
    {!!$tickets->render()!!}
</div>
@endsection