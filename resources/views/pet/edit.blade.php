@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'PUT'])!!}
                @include('user.forms.user')
                <button class="btn btn-primary" onclick="submitUpdateUser(this.form)">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
            {!!Form::close()!!}
        </div>

        <script>
            function submitUpdateUser(form){

                if(form.email.value == <?php echo($user->email); ?>){
                    form.email.value = '';
                }

                form.submit();
            }
        </script>
    @endsection