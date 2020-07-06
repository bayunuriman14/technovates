@extends('front.master')

@section('front.content')



<!-- Single Product Description
============================================= -->
<div class="bg-dark mb-3">
    <div class="column d-flex flex-column align-items-start justify-content-start">
        <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">PRODUCT</h2>
    </div>
</div>
<div class="nobg nobottompadding nobottommargin clearfix">
    <div class="container topmargin clearfix">
        <div class="row d-flex flex-row justify-content-center" >
            <div class="col-12 col-sm-6 d-flex justify-content-center">
	            <div style="position: relative; margin-bottom: 0;float: left;width: 15em;height: 15em;margin: 5px;border: 1px solid rgba(0, 0, 0, .2);" class="bg-primary" >
	               	<img src="{!! url('images') !!}/{!!$product->image!!}">
                </div>
            </div>
            <div class="col-12 col-sm-6 order-lg-12">
                <div class="column" style="margin: 0">
                    <div class="row d-flex justify-content-end" style="margin: 0;text-align: right;">
                        <h2 style="font-weight: lighter;"> {!!$product->name!!} </h2>
                    </div>
                    <p style="font-size: 18px; margin: 0; padding: 0; text-align: right;">
                        {!!$product->content!!} 
                    </p>
                </div>
            </div>
        </div>
        <div class="column d-flex flex-column align-items-center my-5" >
            <div class="row col-sm-6 d-flex justify-content-center">
	            <div style="position: relative; margin-bottom: 0;float: left;width: 20em;height: 20em;margin: 5px;border: 1px solid rgba(0, 0, 0, .2);" class="bg-primary" >
	               	<img src="{!! url('images') !!}/{!!$product->image2!!}" >
                </div>
            </div>
            <div class="row my-3 px-4">
                <p style="font-size: 16px; margin: 0; padding: 0; text-align: center;">
                    {!!$product->content2!!}  
                </p>
            </div>
        </div>
    </div>
</div>




@stop


@section('front.script')
<script>
$(document).ready(function() {
  $("nav#primary-menu > ul > li:nth-child(3)").addClass("active");
});
</script>
@stop