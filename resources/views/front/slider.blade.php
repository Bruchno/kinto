<!-- slider section -->
<section class="slider_section " id="main_section">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach($slider_text as $slider)
      <div class="carousel-item @if($loop->index == 0) active @endif">
        <div class="container ">
          <div class="row">
            <div class="col-md-7 col-lg-6 ">
              <div class="detail-box">
                <h1>
                  {{ $slider->header }}
                </h1>
                <p>
                  {{ $slider->description }}
                </p>
                <div class="btn-box">
                  <a href="{{ $slider_button->description }}" class="btn1" data-toggle="modal" data-target="#exampleModal">
                    {{ $slider_button->header }}
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <div class="container">
      <ol class="carousel-indicators">
        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel1" data-slide-to="1"></li>
        <li data-target="#customCarousel1" data-slide-to="2"></li>
      </ol>
    </div>
  </div>

</section>
<!-- end slider section -->
</div>

<!-- offer section -->
