<!-- Advanced login -->
<form id="form-login" action="{!! url('auth/register')  !!}" method="POST" class="form-valid">
    <input type="hidden" name="_token" class="_token" value="{{{ csrf_token() }}}" />
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
            <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
        </div>

        <div class="content-divider text-muted form-group"><span>Form Registration</span></div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
            <input type="text" class="form-control text-capitalize" required="required" placeholder="Fullname" name="fullname" value="{!! old('fullname') !!}">
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
            <input type="text" class="form-control text-lowercase" required="required" placeholder="username" name="username" value="{!! old('username') !!}">
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-mention text-muted"></i>
            </div>
            <input type="email" id="email" class="form-control" name="email" required="required" placeholder="Your email" value="{!! old('email') !!}">
        </div>

        <div class="content-divider text-muted form-group"><span>Your privacy</span></div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
            <input type="password" id="password" minlength="5" class="form-control" name="password" required="required" placeholder="Create password">
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
            <input type="password" equalto="#password" class="form-control" required="required" placeholder="Repeat password">
        </div>

        <div class="content-divider text-muted form-group"><span>Captcha Code</span></div>

         <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
            
            </div>
            {!! captcha_img() !!}
        </div>

         <div class="form-group has-feedback has-feedback-left">
            <div class="form-control-feedback">
                <i class="icon-lock text-muted"></i>
            </div>
            <input type="text" class="form-control" name="captcha" required="required" placeholder="Captcha Code">
        </div>

        <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
        <br />
        <div class="text-center">
            Already a member ? <a href="{!! url('auth') !!}">Login</a>
        </div>
    </div>
</form>
<!-- /advanced login -->
