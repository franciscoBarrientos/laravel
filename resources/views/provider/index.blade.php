@extends('layouts.principal')
    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert"">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="hide">Close</span>
            </button>
            {{Session::get('message')}}
            </div>
        @endif
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
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tbody>
                @endforeach
            </table>
            {!!$providers->render()!!}
        </div>
    @endsection