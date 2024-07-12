<section class="book_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center psudo_white_primary mb_45">
      <h2 style="font-family: Garamond, serif;">
        Галерея
      </h2>
    </div>
    <div>
      @foreach($galery as $item)
      <a
         data-fancybox="gallery"
         data-src="{{ asset('storage/galery/'.$item) }}"
         >
        <img src="{{ asset('storage/galery/'.$item) }}" class="img-thumbnail item-galery">
      </a>
      @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.17/dist/fancybox/fancybox.umd.js"></script>
    <script>
      Fancybox.bind('[data-fancybox="gallery"]', {
        Slideshow: {
          playOnStart: true,
        },
      });
    </script>
  </div>
</section>
