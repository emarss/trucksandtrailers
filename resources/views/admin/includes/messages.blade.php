<div class="container-fluid">
	@if(Session::has('success'))
		<div class="alert alert-info alert-dismissible">
			<a class="close" data-dismiss="alert">&times;</a>		
			Success: {{ Session::get('message') }}
		</div>
	@endif

	@if(Session::has('fail'))
		<div class="alert alert-danger alert-dismissible">
			<a class="close" data-dismiss="alert">&times;</a>		
			Fail: {{ Session::get('message') }}
		</div>
	@endif

	@if(Session::has('error'))
		<div class="alert alert-danger alert-dismissible">
			<a class="close" data-dismiss="alert">&times;</a>		
			Error: {{ Session::get('message') }}
		</div>
	@endif
</div>