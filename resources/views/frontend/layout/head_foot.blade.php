<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset("assets/images/logo.png")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/all.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.cs")}}s" />
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}" />
    <title>إخـدمـنـى</title>
</head>

<body>
<!------------------------ Start header Section --------------------------->
<nav class="navbar">
    <div class="nav-right">
        <a class="logo" href="#">
            <img src="{{asset("assets/images/logo.png")}}" alt="logo" />
        </a>
        <ul class="nav__links">
            <li><a class="active" href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="#about">من نحن</a></li>
            <li><a href="#features">مميزات التطبيق</a></li>
            <li><a href="#app-screen">شاشات التطبيق</a></li>
            <li><a href="{{url('contact-us')}}">تواصل معنا</a></li>
        </ul>
    </div>


    <div class="nav__bars"><i class="fa fa-bars"></i></div>

    <div class="social__group nav-left">
        @foreach($socials as $social)
        <a href="{{$social->facebook}}"><i class="fab fa-facebook-f"></i></a>
        <a href="{{$social->snap_chat}}"><i class="fab fa-snapchat-ghost"></i></a>
        <a href="{{$social->twitter}}"><i class="fab fa-twitter"></i></a>
        <a href="{{$social->inesta}}"><i class="fab fa-instagram"></i></a>
        @endforeach
    </div>

</nav>

<header>

    <div class="container">
        <div class="header__content">

@inject('Advertisigs','App\Models\Advertising')
@foreach($Advertisigs->get() as $adver)
                @foreach($adver->image as $img)

                <div class="row">
                <div class="header__content-details col-md-6 col-xs-12">
                    <div class="header__title">



                        <h1>{{$adver->tittle}}</h1>
                    </div>
                    <div class="header__text">
                        <p>
                           {{$adver->message}}
                        </p>
                    </div>
                    <div class="btn__group">
                        <a href="{{$social->google_play}}"
                        ><i class="fab fa-google-play"></i> Google
                            Play
                        </a>
                        <a href="{{$social->app_store}}"
                        ><i class="fab fa-apple"></i> App Store
                        </a>
                    </div>
                </div>
                <div class="header__content-img col-md-6 col-xs-12">
                    <img src="{{asset("Accessories/advertising/".$img->filename)}}" alt="" />
                </div>
            </div>
                @endforeach
            @endforeach

        </div>
    </div>
</header>

<div class="before"></div>

<!-- sidebar -->
<div class="side__bar">
    <span class="close__sidebar"><i class="fa fa-times"></i></span>
    <a href="#">
        <img src="{{asset("assets/images/logo.png")}}" alt="logo" />
    </a>
    <ul class="side__bar-links">
        <li><a href="index.html" class="navLink">الرئيسيه</a></li>
        <li><a href="#" class="navLink">من نحن</a></li>
        <li><a href="#" class="navLink">مميزات التطبيق</a></li>
        <li><a href="#" class="navLink">شاشات التطبيق</a></li>
        <li><a href="#" class="navLink">تواصل معنا</a></li>
    </ul>
    <div class="social__group">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-snapchat-ghost"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
</div>
@yield('content')







<footer>
    <div class="footer__container">
        <div class="container">
            <div class="footer_content">
                <a class="footer__logo" href="#"><img src="{{asset("assets/images/logo.png")}}" alt=""/></a>
                <div class="btn__group">
                    @if(isset($social))
                    <a href="{{$social->google_play}}"><i class="fab fa-google-play"></i> Google Play</a>
                    <a href="{{$social->app_store}}"><i class="fab fa-apple"></i> App Store</a>
                @endif
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="container">
                <div class="copyright__footer">
                    <div>
                                <span>
                                    جميع الحقوق محفوظه ل
                                    <a href="#">إخـدمـنـى</a>
                                </span>
                    </div>
                    <a href="#"><img src="{{asset("assets/images/logo1.png")}}" alt=""/></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--==================== SCROLL TOP ====================-->
<a href="#" class="scrollup" id="scroll-up">
    <i class="fa fa-arrow-up scrollup__icon"></i>
</a>
<!------------------------ End footer Section ----------------------------->
<script src="{{asset("assets/js/jquery-3.6.0.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("assets/js/script.js")}}"></script>
</body>
</html>
