<?php 
$locale = Config::get('app.locale');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,400i,600,700|Open+Sans:300,400,600,700,800,900" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/style.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/custom.css" type="text/css" />

	<!-- Business Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{!! url('/') !!}/front/demos/business/business.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/demos/business/css/fonts.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{!! url('/') !!}/front/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="{!! url('/') !!}/front/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="{!! url('/') !!}/front/one-page/css/et-line.css" type="text/css" />

	<link rel="stylesheet" href="{!! url('/') !!}/front/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Theme Color
	============================================= -->
	<link rel="stylesheet" href="{!! url('/') !!}/front/demos/business/css/colors.css" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title> NUSATABAC </title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		@include('front.header')


				@yield('front.content')

			

		@include('front.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{!! url('/') !!}/front/js/jquery.js"></script>
	<script src="{!! url('/') !!}/front/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{!! url('/') !!}/front/js/functions.js"></script>

	<!-- Toastr -->
	<script type="text/javascript" src="{{ url('/') }}/lib/plugins/toastr/toastr.js"></script>
	<link type="text/css" rel="stylesheet" href="{{ url('/') }}/lib/plugins/toastr/toastr.css" />

	@yield('front.script')

	<script>

		$(document).ready(function(){


		});
		// Owl Carousel Scripts
		$('#oc-features').owlCarousel({
			items: 1,
			margin: 60,
		    nav: true,
		    navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
		    dots: false,
		    stagePadding: 30,
		    responsive:{
				768: { items: 2 },
				1200: { stagePadding: 200 }
			},
		});

		function changeLanguageTo(lang) {
				$.ajax({
					url: "{!! url('/') !!}/gantibahasa", // point to server-side PHP script
					dataType: 'json',  // what to expect back from the PHP script, if anything
					data: {
						"language" : lang,
						"_token" : "{{ csrf_token() }}"
					},
					type: 'post',
					success: function(data){

						if(data["STATUS"] == "SUCCESS") {
							toastr.success(data["MESSAGE"]);
							setTimeout(function(){
								window.location = "{!! url('/') !!}";
							}, 500);
						}
						else {
							toastr.error(data["MESSAGE"]);
						}
					},
					error: function() {
						alert("Network/server error");
					}
				});
	  	}
	</script>

</body>
</html>