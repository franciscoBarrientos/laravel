@extends('layouts.principal')
@section('content')
@include('alerts.request')
<div class="container-fluid">
    {!!Form::open(['route'=>'administrator.store', 'method'=>'POST'])!!}
        <div class="form-group">
            {!! Form::label('Seleccione un usuario:') !!}
            <select name="user_id" class="form-control">
                <?php
                    foreach($users as $user){
                        $admin = $administrators->find($user->id);
                        $userId = (explode(",", $admin["user_id"])[0]);

                        if($userId != $user->id){
                            $name = ucfirst(strtolower($user->name));
                            echo('<option value="'.$user->id.'">'.$name.'</option>');
                        }
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Crear
        </button>
    {!!Form::close()!!}
</div>
@endsection