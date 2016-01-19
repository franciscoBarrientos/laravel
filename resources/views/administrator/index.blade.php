@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Administradores</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
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
                        {!!Form::open(['route'=>['administrator.destroy',$administrator->id], 'method'=>'DELETE'])!!}
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