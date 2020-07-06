@extends('front.master')
@section('front.content')

<!-- Contact Us
============================================= -->
    <div class="bg-dark mb-3">
        <div class="column d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">CONTACT US</h2>
        </div>
    </div>
<div class="section nobg nobottompadding nobottommargin clearfix">
    <section id="ContactUs">
	<div class="container clearfix">
		<div class="row clearfix">

			<div class="col-lg-5 order-lg-12">
				<form id="contact-form">
				  <div class="form-group">
				    <label for="contact-email">Email address</label>
				    <input type="email" class="form-control" id="contact-email" aria-describedby="emailHelp" placeholder="Enter your email">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="contact-subject">Subject</label>
				    <input type="text" class="form-control" id="contact-subject" placeholder="What can we help you?">
				  </div>
				  <div class="form-group">
				    <label for="contact-message">Message</label><br/>
					<textarea name="contact-message" id="contact-message" style="min-width: 100%; resize: none" form="contact-form" rows="8"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>

			<div class="col-lg-7 order-lg-1">
				<div style="position: relative; margin-bottom: 0;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
					<img class="man" src="{!! url('/') !!}/front/images/hookahh.jpg" style="position: absolute; top: 0; left: auto; height: 90%" alt="Chrome">
				</div>
			</div>

		</div>
	</div>
</div>


@stop
@section('front.script')
<script>
	$(document).ready(function() {
	  $("nav#primary-menu > ul > li:nth-child(5)").addClass("active");
	});
</script>
@stop