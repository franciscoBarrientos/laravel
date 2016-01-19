@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Proveedores</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div>
            <table class="table">
                <thead>
                    <th>Nombre de fantasía</th>
                    <th colspan="3">Acciones</th>
                </thead>
                @foreach($providers as $provider)
                <tbody>
                    <td>{{$provider->fancy_name}}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#info{{$provider->id}}">
                            <i class="fa fa-info-circle"></i> Información
                        </button>
                        @include('provider.forms.detail')
                    </td>
                    <td>
                        {!!link_to_route('provider.edit', $title = ' Editar', $parameters = $provider->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                    </td>
                    <td>
                        {!!Form::open(['route'=>['provider.destroy',$provider->id], 'method'=>'DELETE'])!!}
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$provider->id}}">
                                <i class="fa fa-user-times"></i> Eliminar
                            </button>
                            @include('provider.forms.confirm')
                        {!!Form::close()!!}
                    </td>
                </tbody>
                @endforeach
            </table>
            {!!$providers->render()!!}
        </div>
    @endsection