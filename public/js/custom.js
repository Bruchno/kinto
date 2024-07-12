// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

jQuery(document).ready(function ($) {
  // Customize Header if page is scrolled
  (function checkScrolledHeader() {
    var $header = $("#header");

    $(window).scroll(checkScroll);

    function checkScroll() {
      var scrollPos = $(document).scrollTop();
      if (scrollPos > 1) {
        $header.addClass("scrolled");
      } else {
        $header.removeClass("scrolled");
      }
      document.querySelectorAll('.my-link').forEach(link => {
        let id = link.getAttribute('href').replace('#', '');
        let refElement = $('#' + id);
        if (refElement.position().top <= scrollPos &&
            refElement.position().top + refElement.height() > scrollPos) {
              link.classList.remove('active');
              link.classList.add('active');
            } else {
              link.classList.remove('active');
            }
      });
    }
    checkScroll();
  })();

  // Show/hide mobile menu
  (function initMobHeaderMenu() {
    var $header = $("#header"),
        $btnMenu = $("#btn-menu"),
        $mainMenu = $("#main-menu");

    $btnMenu.on("click touchend", function (e) {
      $header.toggleClass("active");
      $(this).toggleClass("active");
      $mainMenu.toggleClass("active");
      return false;
    });

    // Hide menu on scroll for Landing Page
    $(window).scroll(deactivateHeader);

    function deactivateHeader() {
      $header.removeClass("active");
      $btnMenu.removeClass("active");
      $mainMenu.removeClass("active");
    }
  })();
});


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function() {
    $('select').niceSelect();
  });

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(58.7984, 17.8081),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

document.querySelectorAll('.my-link').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    let destination = document.querySelector(this.getAttribute('href'));
    destination.scrollIntoView({ behavior: 'smooth' });
    document.querySelectorAll('.my-link').forEach(link => {
      link.classList.remove('active');
      if(this == link){
        link.classList.add('active');
      }
    });
  });
});
