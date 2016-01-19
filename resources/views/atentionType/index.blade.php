@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tipos de Atención</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>Tipo de Atención</th>
                <th colspan="2">Acciones</th>
                </thead>

                @foreach($atentionsType as $atentionType)
                <tbody>
                <td>{{$atentionType->description}}</td>
                <td>
                    {!!link_to_route('atentionType.edit', $title = ' Editar', $parameters = [$atentionType->id], $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    <button data-toggle="modal" data-target="#myModal{{$atentionType->id}}" class="btn btn-danger">
                        <i class="fa fa-minus-circle"></i> Eliminar
                    </button>
                    @include('atentionType.forms.confirm')
                </td>
                </tbody>
                @endforeach
            </table>
            <div>{!! $atentionsType->render() !!}</div>
        </div>
    @endsection