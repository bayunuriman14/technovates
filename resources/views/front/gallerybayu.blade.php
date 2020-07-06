@extends('front.master')

@section('front.content')



<!-- Team Work
============================================= -->
<div class="section nobg nobottompadding nobottommargin clearfix">
	<div class="container clearfix">
		<div class="row clearfix">
			<div class="col-lg-12 order-lg-1">
				<div style="position: relative;">
					<div class="heading-block noborder">
						<h3 style="text-transform: uppercase; text-align: center;">{!! $gallery->title !!}</h3> <br>
					</div>
				</div>
					<div class="text-center">
						<img src="{!! url('images') !!}/{!!$gallery->image!!}" alt="Gallery Image">
					</div>
					 <br> <br>
					{!! $gallery->content !!}
			</div>


		</div>
	</div>
</div>




@stop


@section('front.script')
<script>
$(document).ready(function() {
  $("nav#primary-menu > ul > li:nth-child(4)").addClass("active");
});
</script>
@stop