@extends('layouts.principal')
@section('content')
@include('alerts.message')
<div>
    <div class="row">
        <div class="col-sm-9">
            <h2 class="page-header">Boletas</h2>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-sm-3 page-header">
            <!-- Buscador -->
            {!! Form::open (['route' => 'ticket.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
            <div class="input-group">
                {!! Form::text('number', null, ['class' => 'form-control', 'placeholder'=>'Buscar boleta', 'aria-describedby'=>'search']) !!}
                        <span class="input-group-addon" id="search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                        </span>
            </div>
            {!! Form::close() !!}
            <!-- Fin buscador -->
        </div>
    </div>
    <table class="table">
        <thead>
        <th>Número</th>
        <th>Fecha</th>
        <th>Pagado</th>
        <th colspan="3">Acción</th>
        </thead>
        @foreach($tickets as $ticket)
        <tbody>
        <td>{{$ticket->number}}</td>
        <td>{{$ticket->created_at->format('Y/m/d')}}</td>
        @if($ticket->paid == 0)
            <td>NO</td>
            <td>
                <button class="btn btn-success" data-toggle="modal" data-target="#pagar{{$ticket->id}}">
                    <i class="fa fa-dollar"></i> Pagar
                </button>
                @include('ticket.forms.pay')
            </td>
        @else
            <td>SI</td>
            <td>&nbsp;</td>
        @endif
        <td>
            {!!link_to_route('ticket.pdf', $title = ' Descargar', $parameters = $ticket->id, $attributes = ['class'=>'btn btn-primary icon-pdf'])!!}
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