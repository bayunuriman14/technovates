<form id="form-login" action="{!! url('auth/forgot')  !!}" method="POST" class="form-valid">
        <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
			<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
		</div>

		<div class="form-group has-feedback">
			<div class="form-control-feedback">
				<i class="icon-mail5 text-muted"></i>
			</div>
			<input type="email" class="form-control" name="email" placeholder="Email" required="" value="{!! old('email') !!}" />
		</div>

		<button type="submit" class="btn bg-blue btn-block">Recovery <i class="icon-arrow-right14 position-right"></i></button>
		<br />
		<div class="text-center">
			<a href="{!! url('auth') !!}"> ← Back to login form</a>
		</div>
	</div>
</form>