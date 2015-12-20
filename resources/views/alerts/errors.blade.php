@if(Session::has('message-error'))
    <div class="alert alert-danger alert-dismissible" role="alert"">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <li class="text-left">{{Session::get('message-error')}}</li>
        </ul>
    </div>
@endif