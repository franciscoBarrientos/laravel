@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Administrador</th>
                    <th colspan="2">Correo</th>
                </tr>

                @foreach($administrators as $administrator)
                <tr>
                    <td>{{ucfirst(strtolower($users->find($administrator->user_id)->name))}}</td>
                    <td>{{$users->find($administrator->user_id)->email}}</td>
                    <td>
                        {!!Form::open(['route'=>['administrator.destroy',$administrator->user_id], 'method'=>'DELETE'])!!}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$administrator->id}}">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        @include('administrator.forms.confirm')
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </table>
            <div>{!! $administrators->render() !!}</div>
        </div>
    @endsection