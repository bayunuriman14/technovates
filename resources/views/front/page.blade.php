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
						<h3 style="text-transform: uppercase; text-align: center;">{!! $pages->title !!}</h3> <br>
					</div>
				</div>
					{!! $pages->content !!}
					

			</div>


		</div>
	</div>
</div>




@stop


@section('script')

@stop