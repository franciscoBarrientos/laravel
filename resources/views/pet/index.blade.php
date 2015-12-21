@extends('layouts.principal')
@section('content')
    @include('alerts.message')

    <div id="tableUser" class="table-responsive">
        <table class="table">
            <thead>
                <th>Mascota</th>
                <th>Sexo</th>
                <th colspan="2">Acciones</th>
            </thead>

            @foreach($pets as $pet)
            <tbody>
                <td>{{$pet->name}}</td>
                <td>{{$pet->sex}}</td>
                <td>
                    {!!link_to_route('pet.edit', $title = ' Editar', $parameters = $pet->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['pet.destroy',$pet->id], 'method'=>'DELETE'])!!}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                    {!!Form::close()!!}
                </td>
            </tbody>
            @endforeach
        </table>
        <div>{!! $pets->render() !!}</div>
    </div>
@endsection