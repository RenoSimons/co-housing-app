<div class="mt-2">
    <div class="msg-succes">
		@if(Session::has('success'))
		    <div class="alert alert-success">
		        <span>{{Session::get('success')}}</span>
		    </div>
		@endif
	</div>
	<div class="msg-error">
		@if(Session::has('error'))
		    <div class="alert alert-error">
		        {{Session::get('error')}}
		    </div>
		@endif
	</div>
</div>

<style>
	.alert-success {
		margin-bottom: 0px !important;
	}

	.msg-succes {
		background-color:rgba(0,128,0,0.2);
		color:black;
	}

	.msg-error {
		background-color:red;
		color:white;
	}
</style>