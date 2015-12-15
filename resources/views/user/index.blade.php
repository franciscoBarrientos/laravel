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
    {!!Form::open(['route'=>'usuario.index', 'method'=>'POST'])!!}
        <div id="tableUser">
                <table class="table">
                    <thead>
                        <th>Usuario</th>
                        <th>Correo</th>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {!!link_to_route('usuario.edit', $title = 'editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        </td>
                    </tbody>
                    @endforeach
                </table>
        </div>
    {!!Form::close()!!}
@endsection