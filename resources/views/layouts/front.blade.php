<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.17/dist/fancybox/fancybox.css"
      />

  <title> Kinto -  </title>

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/my_css.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{ asset('storage/source/'. $main_foto->header) }}" alt=""  style="max-height: 1080px;overflow:hidden;width:100%;">
    </div>
    <!-- header section strats -->

<header class="header" id="header">
  <div class="wrap">
    <a href="{{ route('home') }}" class="logo">
      <span>
        <img src="{{ asset('storage/source/'. $logo->header) }}" alt="" height="40">
      </span>
    </a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <ul class="main-menu" id="main-menu">
      <li class="menu-item">
        <a href="#main_section" class="my-link active">
          Головна <span class="sr-only">(current)
        </a>
      </li>
      <li class="menu-item">
        <a href="#food_section" class="my-link">Меню</a>
      </li>
      <li class="menu-item">
        <a href="#about_section" class="my-link">Про&nbsp;нас</a>
      </li>
      <li class="menu-item">
        <a href="#book_section" class="my-link">Контакти</a>
      </li>
      <li class="menu-item">
        <div class="user_option">
          <a href="" class="order_online" data-toggle="modal" data-target="#exampleModal">
            Забронювати
          </a>
        </div>
      </li>
    </ul>
  </div>
    <button class="btn-menu" id="btn-menu" type="button">
      <span class="lines"></span>
      <span class="lines"></span>
      <span class="lines"></span>
    </button>
  </div>
</header>

    <!-- end header section -->


    @yield('content')
  <!-- end offer section -->




  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Наші контакти
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Адреса
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Тел +380 44 264 73 50
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <h4>
              Ласкаво просимо
            </h4>
            <p>
              Для того, щоб скласти хоча б «базове» враження про нашу кухню, варто спробувати: шашлик, пару видів хачапурі, хінкалі, імеретинський сир та чихіртму. З насолод зазвичай рекомендуємо чурчхеллу.
            </p>
            <!-- <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Запрошуємо
          </h4>
          <p>
            Щодня
          </p>
          <p>
            з 10.00 до 24.00
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          <!-- &copy; <span id="displayYear"></span> Завжди раді вітати
          <a href="https://html.design/">Kinto</a><br><br> -->
          &copy; <span id="displayYear"></span> Сайт розроблено компанією
          <a href="https://romanow.com.ua/" target="_blank" style="text-decoration: underline;">Romanow web studio</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script type="text/javascript" src="/js/quickbox.js"></script>

</body>
<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Замовлення</h5>
        <button type="button" data-dismiss="modal" aria-label="Закрыть">X</button>
      </div>
      <div class="modal-body">
        <form action="" id="order_form2" method="post">
          @csrf
          <div>
            <input type="text" name="name" class="form-control" placeholder="Ім'я" />
          </div>
          <p></p>
          <div>
            <input type="text" name="phone" class="form-control" placeholder="Телефон" required/>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
          <button type="submit" id="order_send2" class="btn btn-warning" data-dismiss="modal">Замовити</button>

        </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script>
window.onload = function() {
  const send = document.querySelector("#order_send");
  const send2 = document.querySelector("#order_send2");
  send.addEventListener("click", send_order);
  send2.addEventListener("click", send_order2);

  function send_order(evt) {
      evt.preventDefault();
      var form = document.getElementById("order_form");
      sendForm(form);
    }
  function send_order2(evt) {
      evt.preventDefault();
      var form = document.getElementById("order_form2");
      sendForm(form);
    }
  function sendForm(form){
    const formData = new FormData(form);
    const response = fetch("{{ route('save_order') }}", {
      method: "POST",
      body: formData,
    })
    .then(response => {
      let ip_address = response.text();
      const promise1 = Promise.resolve(ip_address);
      console.log(promise1);
      promise1.then((value) => {
          var head = document.querySelector("#order_send");
          if(value == 1) {
            alert('Готово!!')
          } else {
            alert('Вибачте, сталася помилка');
          }
      });
    })
    .catch((data, status) => {
      console.log('Request failed');
    });
  }
};

var $page = $('html, body');
$('a[href*="#"]').click(function() {
    $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 200);
    return false;
});
</script>

</html>
