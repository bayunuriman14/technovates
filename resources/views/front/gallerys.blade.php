@extends('front.master')

@section('front.content')

<section id="content">
    <div class="bg-dark mb-3">
        <div class="column d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">GALLERY</h2>
        </div>
    </div>
<div class="container">
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

    @endif
  </div>
</div>
</section>

@stop

@section('front.script')
<script>
  $(document).ready(function() {
    $("nav#primary-menu > ul > li:nth-child(3)").addClass("active");
  });
</script>
@stop