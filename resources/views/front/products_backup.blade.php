@extends('front.master')

@section('front.content')

<section id="content">
    <div class="bg-dark mb-3">
        <div class="column d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">PRODUCTS</h2>
        </div>
    </div>
<div class="container">
  <div class="row d-flex flex-row justify-content-center">
    <a href="{!! url('/') !!}/products/product-id" class="card product-card p-2 text-center">
      <img src="{!! url('/') !!}/front/images/pear.png" class="img-responsive p-3 mt-2 mb-1">
      <h5 class="card-title mt-2">Exotic</h5>
      <h3 class="card-text">Pear</h3>
    </a>
    <a href="{!! url('/') !!}/products/product-id" class="card product-card p-2 text-center">
      <img src="{!! url('/') !!}/front/images/orange.png" class="img-responsive p-3 mt-2 mb-1">
      <h5 class="card-title mt-2">Exotic</h5>
      <h3 class="card-text">Orange</h3>
    </a>
    <a href="{!! url('/') !!}/products/product-id" class="card product-card p-2 text-center">
      <img src="{!! url('/') !!}/front/images/pear.png" class="img-responsive p-3 mt-2 mb-1">
      <h5 class="card-title mt-2">Exotic</h5>
      <h3 class="card-text">Pear</h3>
    </a>
    <a href="{!! url('/') !!}/products/product-id" class="card product-card p-2 text-center">
      <img src="{!! url('/') !!}/front/images/orange.png" class="img-responsive p-3 mt-2 mb-1">
      <h5 class="card-title mt-2">Exotic</h5>
      <h3 class="card-text">Orange</h3>
    </a>
    <a href="{!! url('/') !!}/products/product-id" class="card product-card p-2 text-center">
      <img src="{!! url('/') !!}/front/images/pear.png" class="img-responsive p-3 mt-2 mb-1">
      <h5 class="card-title mt-2">Exotic</h5>
      <h3 class="card-text">Pear</h3>
    </a>
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
