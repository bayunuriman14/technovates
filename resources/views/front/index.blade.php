@extends('front.master')

@section('front.content')
<!-- Content
============================================= -->
<section id="content">

    <!-- Section 1
============================================= -->
<div class="section nobg nomargin clearfix">
	<div class="container topmargin clearfix">
		<section id="2">

		<div class="row d-flex">
            <div class="col-6 order-1 align-self-center">
                <h1 style="font-weight: lighter;">A Simple Hookah</h1>
				<h3 style="font-weight: lighter;">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
				</h3>
                <a href="{!! url('/') !!}/en/about-us" class="btn btn-secondary text-center text-light px-5">LEARN MORE</a>
			</div>
            <div class="col-6 order-2">
                <div style="position: relative; margin-bottom: 0;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
                    <img class="man" src="{!! url('/') !!}/front/images/hookahh.jpg" style="position: absolute; top: 0; left: auto; height: 90%" alt="Chrome">
                </div>
            </div>
		</div>
	</div>
</div>

	<!-- Section 2
============================================= -->
<div class="section nobg nobottompadding nobottommargin clearfix">
    <div class="container topmargin clearfix">
        <section id="1">

        <div class="row d-flex flex-row justify-content-center" >
            <div class="col-6 order-lg-1">
                <div style="position: relative; margin-right: 100px;" class="ohidden" data-height-xl="420" data-height-lg="420" data-height-md="420" data-height-sm="420" data-height-xs="200">
                    <img src="{!! url('/') !!}/front/images/hookahh.jpg" style="position: absolute; top: 0; right: : auto; height: 90%" alt="Chrome">
                </div>
            </div>
            <div class="col-6 order-lg-12">
                <div class="column" style="margin: 0">
                    <div class="row" style="margin: 0">
                        <h3>NUSATABAC</h3><h3 style="font-weight: lighter">INTERNATIONAL</h3>
                    </div>
                    <div class="row" style="margin: 0">
                        <h3 style="font-weight: lighter;">SINCE</h3><h3>2009</h3>
                    </div>
                    <p style="font-size: 20px; margin: 0; padding: 0">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content-wrap nobottompadding" style="z-index: 1;">

	<!-- Section 3
============================================= -->
<section>
        <div style="background-color: black; height: 16rem">
            <div class="column" style="height: inherit; display: flex; flex-direction: column; align-items: center;justify-content: center; margin: 20px 0;">
                <h2 style="color: white; margin: 0">EXOTIC TASTE</h2>
                <h3 class="mx-2" style="color: white; font-weight: lighter;">Contrary to popular belief, Lorem Ipsum is not simply random text. </h3>
            </div>
        </div>
</section>

<div class="content-wrap nobottompadding" style="z-index: 1;">
	<!-- Section 4
============================================= -->
<section>
    <div id="carouselExampleInterval" class="carousel slide " data-ride="carousel">
      <div class="carousel-inner container">
        <div class="carousel-item active" data-interval="10000">
            <div class="row">
                <div class="col-6">
                    <div style="position: relative; margin-right: 100px;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
                        <img src="{!! url('images') !!}/{!!$orange->image!!}" style="position: absolute; top: 0; right: : auto; height: 90%" alt="Chrome">
                    </div>
                </div>
                <div class="col-6 align-self-start">
                    <div class="column">
                        <h2 style="text-decoration: underline;"> {!!$orange->name!!} </h2>
                        <p style="font-size: 20px; margin-bottom: 1em; padding: 0">
                            {!!$orange->desc!!} 
                        </p>
                        <a href="{!! url('/') !!}/{!! $lang !!}/products/{!! $orange->slug !!}" class="btn btn-secondary px-4">VIEW MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-interval="2000">
            <div class="row">
                <div class="col-6">
                    <div style="position: relative; margin-right: 100px;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
                        <img src="{!! url('images') !!}/{!!$pear->image!!}" style="position: absolute; top: 0; right: : auto; height: 90%" alt="Chrome">
                    </div>
                </div>
                <div class="col-6 align-self-start">
                    <div class="column">
                        <h2 style="text-decoration: underline;">{!!$pear->name!!} </h2>
                        <p style="font-size: 20px; margin-bottom: 1em; padding: 0">
                            {!!$pear->desc!!}  
                        </p>
                        <a href="{!! url('/') !!}/{!! $lang !!}/products/{!! $pear->slug !!}" class="btn btn-secondary px-4">VIEW MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row">
                <div class="col-6">
                    <div style="position: relative; margin-right: 100px;" class="ohidden" data-height-xl="520" data-height-lg="520" data-height-md="520" data-height-sm="500" data-height-xs="300">
                        <img src="{!! url('images') !!}/{!!$papaya->image!!}" style="position: absolute; top: 0; right: : auto; height: 90%" alt="Chrome">
                    </div>
                </div>
                <div class="col-6 align-self-start">
                    <div class="column">
                        <h2 style="text-decoration: underline;"> {!!$papaya->name!!} </h2>
                        <p style="font-size: 20px; margin-bottom: 1em; padding: 0">
                            {!!$papaya->desc!!}
                        </p>
                        <a href="{!! url('/') !!}/{!! $lang !!}/products/{!! $papaya->slug !!}" class="btn btn-secondary px-4">VIEW MORE</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</section>

	<!-- Section 5
============================================= -->
<section id="Products">
<div class="container topmargin clearfix">
    <div class="row">
        <div class="col text-center">
            <h1 style="font-weight: lighter;"><b>LATEST</b> GALLERY</h1>
        </div>
    </div>
    <div class="row d-flex flex-row justify-content-center">
        @if(isset($gallerys) && count($gallerys)>0)
            @foreach($gallerys as $gallery)

            <a href="{!! url('/') !!}/{!! $lang !!}/gallery/{!! $gallery->slug !!}" class="card product-card h-100 p-2 text-left">
                <article>
                    <?php  
                    $galleryimage= DB::table("gallery_image")
                    ->select('image')
                    ->where('id_gallery',$gallery->id)
                    ->where('order','=','1')
                    ->first();
                    ?>
                    
                        <img src="{!! url('images') !!}/gallery/{!!$galleryimage->image!!}">
                    
                    <h3 class="card-title nobottommargin">
                        {!! $gallery->title !!}
                    </h3>
                    <p class="card-text" style="color: black;">
                        {!! $gallery->desc !!}
                    </p>
                </article>
            </a>

            @endforeach

        @else
        <a href="/product/collection-name/product-id" class="card product-card h-100 p-2 text-left">
            <article>
                <div class="p-5">
                    <img src="{!! url('/') !!}/front/images/orange.png">
                </div>
                <h3 class="card-title nobottommargin">
                    Orange
                </h3>
                <p class="card-text" style="color: black;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                </p>
            </article>
        </a>
        <a href="/product/collection-name/product-id" class="card product-card h-100 p-2 text-left">
            <article>
                <div class="p-5">
                    <img src="{!! url('/') !!}/front/images/orange.png">
                </div>
                <h3 class="card-title nobottommargin">
                    Orange
                </h3>
                <p class="card-text" style="color: black;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </article>
        </a>
        <a href="/product/collection-name/product-id" class="card product-card h-100 p-2 text-left">
            <article>
                <div class="p-5">
                    <img src="{!! url('/') !!}/front/images/orange.png">
                </div>
                <h3 class="card-title nobottommargin">
                    Orange
                </h3>
                <p class="card-text" style="color: black;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </article>
        </a>
        @endif
    </div>
    <nav >
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link " href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link " href="#">1</a></li>
        <li class="page-item"><a class="page-link " href="#">2</a></li>
        <li class="page-item"><a class="page-link " href="#">3</a></li>
        <li class="page-item">
          <a class="page-link " href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
</div>
</section>

</section><!-- #content end -->

@stop


@section('front.script')
<script>
$(document).ready(function() {
  $("nav#primary-menu > ul > li:nth-child(1)").addClass("active");
});
</script>
@stop