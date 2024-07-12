<section class="about_section layout_padding" id="about_section">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="{{ asset('storage/source/'. $about_foto->header) }}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2  style="font-family: Garamond, serif;">
              {{ $about_content->header }}
            </h2>
          </div>
          <p>
            {{ $about_content->description }}
          </p>
          <a href="#" data-toggle="modal" data-target="#exampleModal">
            Деталі
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
