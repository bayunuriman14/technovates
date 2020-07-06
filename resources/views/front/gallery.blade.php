@extends('front.master')

@section('front.content')
<style>
.opt-img:hover {
  opacity: 0.7;
}

.showcase-card {
    max-width: 15rem;
    height: 8rem; 
}

.fill {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden
}

.fill img {
    flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
}

/*
    code by Iatek LLC 2018 - CC 2.0 License - Attribution required
    code customized by Azmind.com
*/
@media (min-width: 768px) and (max-width: 991px) {
    /* Show 4th slide on md if col-md-4*/
    .carousel-inner .active.col-md-4.carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) and (max-width: 768px) {
    /* Show 3rd slide on sm if col-sm-6*/
    .carousel-inner .active.col-sm-6.carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) {
    .carousel-item {
        margin-right: 0;
    }
    /* show 2 items */
    .carousel-inner .active + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item {
        transition: none;
    }
    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* farthest right hidden item must be also positioned for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* MD */
@media (min-width: 768px) {
    /* show 3rd of 3 item slide */
    .carousel-inner .active + .carousel-item + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
        transition: none;
    }
    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* LG */
@media (min-width: 991px) {
    /* show 4th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    /* Show 5th slide on lg if col-lg-3 */
    .carousel-inner .active.col-lg-3.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
</style>

<script>
function toShowcase(el) {
  let img = $(el).attr("src");
  $("#showcase-img").attr("src", img);
}
</script>

<div class="bg-dark mb-3">
    <div class="column d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">GALLERY</h2>
    </div>
</div>
<section id="content" class="container">
<div class="row">
<div class="col-12 p-4">
    <div class="row">
        <div class="col">
            <h3 class="mb-0">{!!$gallery->title!!}</h3>
            <small>{!!$gallery->created_at!!}<br>created by <b>{!!$gallery->created_by!!}</b></small>
        </div>
    </div>
    <div class="row p-3">
        <img class="d-block w-100" id="showcase-img" src="{!! url('images') !!}/gallery/{!!$image1->image!!}">
    </div>
    <div class="row">
        <div class="col">
            <p id="showcase-desc">
                {!!$gallery->content!!}
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex flex-row justify-content-center">
          <a href="#showcase-img">
            <div class="card product-card p-1 text-center" style="height: 9rem;">
              <img src="{!! url('images') !!}/gallery/{!!$image1->image!!}" class="opt-img" onclick="toShowcase(this)">
            </div>
          </a>
          <a href="#showcase-img">
            <div class="card product-card p-1 text-center" style="height: 9rem;">
              <img src="{!! url('images') !!}/gallery/{!!$image2->image!!}" class="opt-img" onclick="toShowcase(this)">
            </div>
          </a>
          <a href="#showcase-img">
            <div class="card product-card p-1 text-center" style="height: 9rem;">
              <img src="{!! url('images') !!}/gallery/{!!$image3->image!!}" class="opt-img" onclick="toShowcase(this)">
            </div>
          </a>
        </div>
    </div>
    <hr>
</div>
</div>
</div>

<div class="row">
  <h3 class="col text-center">Other Gallery</h3>
</div>

<div class="container">
 <!-- Top content -->
 <div class="top-content">
  <div class="container-fluid">
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                <img src="{!! url('images') !!}/gallery/{!!$image1->image!!}" class="img-fluid mx-auto d-block" alt="img1">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image2->image!!}" class="img-fluid mx-auto d-block" alt="img2">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image3->image!!}" class="img-fluid mx-auto d-block" alt="img3">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image4->image!!}" class="img-fluid mx-auto d-block" alt="img4">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image5->image!!}" class="img-fluid mx-auto d-block" alt="img5">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image6->image!!}" class="img-fluid mx-auto d-block" alt="img6">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image1->image!!}" class="img-fluid mx-auto d-block" alt="img7">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{!! url('images') !!}/gallery/{!!$image2->image!!}" class="img-fluid mx-auto d-block" alt="img8">
            </div>
        </div>
        <div class="container-fluid text-center mt-3">
          <a href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
          <a href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>  
@stop

@section('front.script')
<script>
$('#carousel-example').on('slide.bs.carousel', function (e) {
  /*
      CC 2.0 License Iatek LLC 2018 - Attribution required
  */
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems-(itemsPerSlide-1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i=0; i<it; i++) {
      // append slides to end
      if (e.direction=="left") {
        $('.carousel-item').eq(i).appendTo('.carousel-inner');
      }
      else {
        $('.carousel-item').eq(0).appendTo('.carousel-inner');
      }
    }
  }
});
$(document).ready(function() {
  $("nav#primary-menu > ul > li:nth-child(4)").addClass("active");
});
</script>
@stop