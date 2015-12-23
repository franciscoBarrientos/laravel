@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div>
            <table class="table">
                <thead>
                    <th>Nombre de fantasía</th>
                    <th>Razón social</th>
                    <th>Giro</th>
                    <th>Rut</th>
                    <th>Nombre Contacto</th>
                    <th>Email Contacto</th>
                    <th>Teléfono Contacto</th>
                    <th colspan="2">Acciones</th>
                </thead>
                @foreach($providers as $provider)
                <tbody>
                    <td>{{$provider->fancy_name}}</td>
                    <td>{{$provider->business_name}}</td>
                    <td>{{$provider->activity}}</td>
                    <td>{{$provider->rut}} - {{$provider->verifying_digit}}</td>
                    <td>{{$provider->name}}</td>
                    <td>{{$provider->email}}</td>
                    <td>{{$provider->phone}}</td>
                    <td>
                        {!!link_to_route('provider.edit', $title = ' Editar', $parameters = $provider->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
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