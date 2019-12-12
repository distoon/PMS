@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="text-align: center;list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('error'))


        <li class="alert alert-danger" role="alert" style="text-align: center; list-style: none;" >{{Session::get('error')}}</li>


@endif




@if (Session::has('message'))
        <li class="alert alert-info" role="alert" id="message" style="text-align: center; list-style: none;" >{{Session::get('message')}}</li>
@endif


<script type="text/javascript">
	setTimeout(function() {
  $('#message').hide()
}, 4000);
</script>
