@extends('front.master')

@section('front.content')

@include('front.slider')
<!-- Content
============================================= -->
<section id="content">

	<!-- Contact Us
============================================= -->
<div class="section nobg nobottompadding nobottommargin clearfix">
	<div class="container topmargin clearfix">
		<section id="About">

		<div class="heading-block center noborder" data-heading="A" style="background-color: black">
			<h3 class="white">About Us</h3>
		</div>
		<div class="row clearfix">

			<div class="col-lg-5 order-lg-1">
				
				<h3 class="nobottommargin" style="font-size: 40px;">WHAT IS NUSATABAC ?</h3>
				<p>
						Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Tincidunt nunc pulvinar sapien et ligula ullamcorper. Ut etiam sit amet nisl. Massa id neque aliquam vestibulum morbi blandit cursus risus. Consectetur lorem donec massa sapien faucibus et. Donec ac odio tempor orci dapibus ultrices in. Ultrices in iaculis nunc sed. Sed viverra tellus in hac habitasse platea dictumst vestibulum rhoncus. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam donec adipiscing tristique risus nec feugiat. Ultricies mi eget mauris pharetra et ultrices neque. Iaculis eu non diam phasellus vestibulum lorem.
						<a href="#" class="button-link bottommargin">Selengkapnya</a>
				</p>
				
			</div>

			<div class="col-lg-7 order-lg-12">
				<div style="position: relative; margin-bottom: 0;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
					<img class="man" src="{!! url('/') !!}/front/images/hookahh.jpg" style="position: absolute; top: 0; left: auto; height: 90%" alt="Chrome">
				</div>
			</div>

		</div>
	</div>
</div>


<div class="content-wrap nobottompadding" style="z-index: 1;">



<div class="container topmargin clearfix">
	<section id="Products">
	<!-- Products
	============================================= -->
	<div class="heading-block center noborder" data-heading="P">
		<h3>PRODUCTS</h3>
	</div>
	<div class="row clearfix">

		<!-- Features colomns
		============================================= -->
		<div class="row clearfix">
			<div class="col-lg-4 bottommargin-sm">
				<div class="feature-box media-box fbox-bg">
					<div class="fbox-media">
						<a href="#"><img class="image_fade" src="{!! url('/') !!}/front/demos/business/images/featured/1.jpg" alt="Featured Box Image"></a>
					</div>
					<div class="fbox-desc">
						<h3 class="nott ls0 t600">Proyek 1<span class="subtitle font-secondary t300 ls0">Globally parallel task premium infomediaries</span></h3>
						<a href="#" class="button-link noborder color">Selanjutnya</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 bottommargin-sm">
				<div class="feature-box media-box fbox-bg">
					<div class="fbox-media">
						<a href="#"><img class="image_fade" src="{!! url('/') !!}/front/demos/business/images/featured/2.jpg" alt="Featured Box Image"></a>
					</div>
					<div class="fbox-desc">
						<h3 class="nott ls0 t600">Proyek 2<span class="subtitle font-secondary t300 ls0">Energistically visualize market-driven.</span></h3>
						<a href="#" class="button-link noborder color">Selanjutnya</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 bottommargin-sm">
				<div class="feature-box media-box fbox-bg">
					<div class="fbox-media">
						<a href="#"><img class="image_fade" src="{!! url('/') !!}/front/demos/business/images/featured/3.jpg" alt="Featured Box Image"></a>
					</div>
					<div class="fbox-desc">
						<h3 class="nott ls0 t600">Proyek 3<span class="subtitle font-secondary t300 ls0">Enthusiastically iterate enabled portals after.</span></h3>
						<a href="#" class="button-link noborder color">Selanjutnya</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Gallery
============================================= -->
<div class="section nobg clearfix">
	
	<div class="container clearfix">
		<section id="Gallery">
		<div class="heading-block bottommargin-lg center noborder" data-heading="W">
			<h3 class="nott ls0">GALLERY</h3>
		</div>
	</div>

	<!-- How We Work - Carousel
	============================================= -->
	<div id="oc-features" class="owl-carousel owl-carousel-full image-carousel carousel-widget">
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="{!! url('/') !!}/front/demos/business/images/carousel/1.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Perencanaan yang Matang.</h3>
					<p>Uniquely plagiarize dynamic convergence after equity invested experiences. Holisticly repurpose installed base infomediaries before web-enabled methods of empowerment.</p>
					<a href="#" class="button-link">Selanjutnya</a>
				</div>
			</div>
		</div>
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="{!! url('/') !!}/front/demos/business/images/carousel/2.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Profesionalisme di Lapangan.</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor mollitia dignissimos, assumenda consequuntur consectetur! Laborum reiciendis, accusamus possimus et similique nisi obcaecati ex doloremque ea odio.</p>
					<a href="#" class="button-link">Selanjutnya</a>
				</div>
			</div>
		</div>
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="{!! url('/') !!}/front/demos/business/images/carousel/3.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Manajemen yang Komprehensif.</h3>
					<p>Dolor mollitia dignissimos, assumenda consequuntur consectetur! Laborum reiciendis, error explicabo consectetur adipisci, accusamus possimus et similique nisi obcaecati ex doloremque ea odio.</p>
					<a href="#" class="button-link">Selanjutnya</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Contact Us
============================================= -->
<div class="section nobg nobottompadding nobottommargin clearfix">
	<div class="container clearfix">
		<section id="ContactUs">
		<div class="heading-block center noborder" data-heading="C">
			<h3>Contact Us</h3>
		</div>
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










</section><!-- #content end -->

@stop


@section('script')

@stop