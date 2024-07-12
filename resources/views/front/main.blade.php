@extends('layouts.front')

@section('content')

@include('front.slider', [
     'slider_text' => $slider_text,
     'slider_button' => $slider_button
     ])

@include('front.discount', ['discounts' => $discounts])

<!-- food section -->

@include('front.food', [
     'products' => $products,
     'arr_category' => $arr_category
     ])

<!-- end food section -->

<!-- about section -->

@include('front.about', [
   'about_foto' => $about_foto,
   'about_content' => $about_content
])

<!-- end about section -->

@include('front.galery', [
   'galery' => $galery,
])

<!-- book section -->
<section class="book_section layout_padding" id="book_section">
  <div class="container">
    <!-- <div class="heading_container">
      <h2>
        Наші контакти
      </h2>
    </div> -->
    <div class="row">
      @include('front.order_form')
      <div class="col-md-6">
        <div class="map_container ">
          {!! $coordinate->description !!}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end book section -->

<!-- client section -->

@include('front.client', ['teams' => $teams])
<!-- end client section -->

@endsection
