@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            </br>
            </br></br>
            {!!Form::open(['route'=>'atention.store', 'method'=>'POST'])!!}
                @include('atention.forms.atention')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('atention.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
            {!!Form::close()!!}
        </div>
    @endsection