<!-- Simple login form -->
<form id="form-login" action="{!! url('auth/dologin')  !!}" method="POST" class="form-valid">
    <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
			<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<div class="form-control-feedback">
				<i class="icon-mention text-muted"></i>
			</div>
			<input type="email" name="email" class="form-control" placeholder="Email" required="" value="{!! old('email') !!}" />
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<div class="form-control-feedback">
				<i class="icon-lock2 text-muted"></i>
			</div>
			<input type="password" name="password" class="form-control" placeholder="Password" required="" />
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
		</div>

		<div class="text-center">
			<a href="{!! url('auth/forgot') !!}">Forgot password?</a>
		</div>
	</div>
</form>
<!-- /simple login form -->


