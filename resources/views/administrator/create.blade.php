@extends('layouts.principal')
@section('content')
@include('alerts.request')
<div class="container-fluid">
    <?php $arrayUsers = array();
        foreach($administrators as $administrator){
            $userFound = null;
            $userFound = $users->find($administrator->user_id);
            if(!is_null($userFound)){
                array_push($arrayUsers, $userFound->id);
            }
        }
    ?>

    {!!Form::open(['route'=>'administrator.store', 'method'=>'POST'])!!}
        <div class="form-group">
            {!! Form::label('Seleccione un usuario:') !!}
            <select name="user_id" class="form-control">
                <?php
                    foreach($users as $user){
                        $flag = 0;
                        foreach($arrayUsers as $arrayUser){
                            if($arrayUser == $user->id){
                                $flag = 1;
                            }
                        }
                        if($flag == 0){
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