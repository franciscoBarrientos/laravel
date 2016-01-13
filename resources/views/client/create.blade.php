@extends('layouts.principal')
@section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'client.store', 'method'=>'POST'])!!}
            @include('client.forms.client')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Registrar
            </button>
            <a href="{{ route('client.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left"></i>  Volver
            </a>
        {!!Form::close()!!}
@endsection