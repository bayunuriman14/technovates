@extends('front.master')

@section('front.content')

<section id="content">
    <div class="bg-dark mb-3">
        <div class="column d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-light mx-5" style="color: white; margin: 20px 0;">ABOUT US</h2>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4>We are What?</h4>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
        <div class="col-4">
            <iframe width="auto" height="300" src="https://www.youtube.com/embed/dQw4w9WgXcQ" style="border: 1px solid;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="{!! url('/') !!}/front/images/orange.png" alt="#" class="p-4" width="auto" height="300" style="border: 1px solid;">
        </div>
        <div class="col-8">
            <h4>Why Choose Us?</h4>
            <b> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</b>
            <ul type="square" class="ml-3">
                <li>There are many variations of passages of Lorem Ipsum available</li>
                <li>Majority have suffered alteration in some form</li>
                <li>Randomised words which don't look even slightly believable</li>
            </ul>
        </div>
    </div>
</div>
</section>

@stop

@section('front.script')
<script>
  $(document).ready(function() {
    $("nav#primary-menu > ul > li:nth-child(2)").addClass("active");
  });
</script>
@stop