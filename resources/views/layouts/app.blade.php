
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Motutor - Quality and affordable education for all</title>
        <!-- Fonts -->
       <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="align-items-center p-4 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <div class="logo">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        <img src="{{ asset('images/Motutor.jpg') }}" alt="Motutor">
                    </h5>
                </div>
                <div class="menu pull-right">
                    <a class="btn btn-outline-success" href="">Invest in schools</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-success text-white">Blog</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}"> Signup </a>
                        @endauth
                    @endif
                </div>
            </div>

            <div class="content">
                @yield('content')
            </div>
        @include('layouts.footer')
        <script src="{{ asset('js/swiper.min.js') }}"></script>
        <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      slidesPerColumn: 1,
      spaceBetween: 10,

      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      },
      navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    });
  </script>
</body>
</html>
