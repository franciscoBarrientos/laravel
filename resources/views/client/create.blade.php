@extends('layouts.principal')
@section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'client.store', 'method'=>'POST'])!!}
            @include('client.forms.client')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
        {!!Form::close()!!}
@endsection