@if(count($errors) > 0)
<div class="container-fluid">
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-left">{!!$error!!}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif