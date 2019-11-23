@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
  	<div id="alert-danger" class="alert alert-danger mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<p>
			<strong>{{ __('Error') }}!</strong> {{ __($error) }}
		</p>
	</div>
	
  @endforeach
@endif

@if (session()->has('success'))
	<div id="alert-success" class="alert alert-success mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<p>				
			<strong>{{__('SUCCESS') }}!</strong> {{__(session('success')) }}
		</p>
	</div>
	
@endif

@if (session()->has('message'))
	<div id="alert-info" class="alert alert-info mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>			
		<p>						
			<strong>{{__('SUCCESS') }}!</strong> {{__(session('message')) }}
		</p>
	</div>
	
@endif

@if (session()->has('error'))
	<div id="alert-danger" class="alert alert-danger mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<p>
			<strong>{{ __('Error') }}!</strong> {{__(session('error')) }}
		</p>
	</div>
	
@endif

@if (session()->has('warning'))
	<div id="alert-warning" class="alert alert-warning mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<p>
			<strong>Warning!</strong> {{__(session('message')) }}
		</p>
	</div>
	
@endif

@if (session('status'))
	<div id="alert-info" class="alert alert-info mb30">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<p>
			<strong>Info!</strong> {{__(session('status')) }}
		</p>
	</div>
	
@endif