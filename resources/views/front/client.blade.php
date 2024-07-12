<section class="client_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center psudo_white_primary mb_45">
      <h2  style="font-family: Garamond, serif;">
        Відгуки
      </h2>
    </div>
    <div class="carousel-wrap row ">
      <div class="owl-carousel client_owl-carousel">
        @foreach($teams as $customer)
        <div class="item">
          <div class="box">
            <div class="detail-box">
              <h6>
                {{ $customer->fullname }}
              </h6>
              <p>
                ☆☆☆☆☆
              </p>
              <p>
                {{ $customer->description }}
              </p>
            </div>
            <!-- <div class="img-box">
              <img src="{{ asset('storage/source/'. $customer->avatar) }}" alt="" class="box-img">
            </div> -->
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
