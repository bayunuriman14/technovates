<form id="form-login" action="{!! url('auth/reset')  !!}" method="POST" class="form-valid">
<input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
<input type="hidden" name="token" class="token" value="{!! $token !!}" />
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
            <h5 class="content-group">New Password</h5>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
            <input type="password" id="password" class="form-control" name="password" required="required" placeholder="Create new password">
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
            <input type="password" equalto="#password" class="form-control" required="required" placeholder="Repeat new password">
        </div>

        <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
        <br />
        <div class="text-center">
            <a href="{!! url('auth') !!}"> ← Back to login form</a>
        </div>
    </div>
</form>