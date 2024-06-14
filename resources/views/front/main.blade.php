@extends('layouts.front')

@section('content')

@include('front.discount', ['discounts' => $discounts])

<!-- food section -->

@include('front.food', [
     'products' => $products,
     'arr_category' => $arr_category
     ])

<!-- end food section -->

<!-- about section -->

<section class="about_section layout_padding" id="about_section">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              We Are Feane
            </h2>
          </div>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
            in some form, by injected humour, or randomised words which don't look even slightly believable. If you
            are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
            the middle of text. All
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- book section -->
<section class="book_section layout_padding" id="book_section">
  <div class="container">
    <div class="heading_container">
      <h2>
        Book A Table
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form action="">
            <div>
              <input type="text" class="form-control" placeholder="Your Name" />
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Phone Number" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Your Email" />
            </div>
            <div>
              <select class="form-control nice-select wide">
                <option value="" disabled selected>
                  How many persons?
                </option>
                <option value="">
                  2
                </option>
                <option value="">
                  3
                </option>
                <option value="">
                  4
                </option>
                <option value="">
                  5
                </option>
              </select>
            </div>
            <div>
              <input type="date" class="form-control">
            </div>
            <div class="btn_box">
              <button>
                Book Now
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="map_container ">
          <div id="googleMap"></div>
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
