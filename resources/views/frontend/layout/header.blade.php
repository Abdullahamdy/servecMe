<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>


    <style>
        .logou:hover{background-color: white;}
        
        .logou{
            background-color:#F8D62E;
            -webkit-border-radius: 21px 21px;
            padding: 8px;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">
    <!--Main Temblet Css File-->
    <!--Main Fram Work BootStrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome Libary -->
    <link rel="stylesheet" href="{{asset("frontend/css/all.min.css")}}">
    <!--wow js -->
    @yield('css')


</head>

<body>

    <!--Start Navbar-->
    <header>
        <nav class="navbar  navbar-expand-lg  navbar-light bg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{asset("frontend/img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png")}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              @inject('category','App\Models\Category')
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">الصفحه الرئيسيه</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 المنتجات
                             </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                @foreach ($category->get() as $cate)
                                <li><a class="dropdown-item" href="{{route('product',$cate->id)}}">{{$cate->name}}</a></li>
                                 @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("show-favourite")}}">المفضلة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact-us')}}">انصل بنا</a>
                        </li>
                    </ul>
                </div>
                @if(Auth::guest())

                <a href="{{route('clientlogin')}}" type="button" class="login"> تسجيل الدخول</a>
                @else
                <form method="post" action="logout"style="margin-left:40px;">
                    @csrf
                <button class="logou" href="{{route('logout')}}" type="submit"style=""> تسجيل الخروج</button>
                </form>
                <a href="{{route('show-cart')}}" class="shop-car">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                @endif
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar">
                    @foreach ($category->get() as $cate )
                    <a class="active wow bounceInRight" data-wow-duration="2s" data-wow-delay="3s" href="{{route('product',$cate->id)}}">{{$cate->name}}</a>
                    @endforeach
                </div>
            </div>








    @yield('content')











    <footer>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <p class="h3">Mobile accessories</p>
                        <img src="{{asset('frontend/img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png')}}" alt="">
                    </div>
                    <div class="col-md-3">
                        <p class="h3">اتصل بنا</p>
                        <div class="text">
                            <p class="h5">
                                <i class="fas fa-phone"></i>
                                <a href="tel:01235411545">01235411545</a>
                            </p>
                            <p class="h5">
                                <i class="fas fa-envelope-open"></i>
                                <a href="">
                                    whatever@gmail.com
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="h3">
                            عنواننا
                        </p>
                        <div class="text">
                            <p class="h5"> <i class="fas fa-map-marked-alt"></i>
                                <a class="address" href="">المنصورة شارع الترعه  <br>  فوق مطعم اهل الشام</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="h3">
                            وسائل التواصل الاجتماعي
                        </p>
                        <div class="text">
                            <a href=""> <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href="">
                                <i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row lastRow">
                    <p class="h6"><a href="terms&condition.html">الاحكتم والشوط</a>
                        <a href="terms&condition.html">سياسه االخصوصيه</a>
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->

    <!-- Start Loading Screen -->

    <!-- End Loading Screen -->
    <!-- Main Js Templet From BootStrap5-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="{{asset("frontend/js/wow.min.js")}}"></script>
    <script>
        new WOW().init();
    </script>

    <script>
        $(window).load(function() {
            //show he scroll
            //loading Element
            $(".loading-overlay .h1 ").fadeOut(1000,
                function() {
                    $(this).parent().fadeOut(1000,
                        function() {
                            $("body").css("overflow", "auto")
                            $(this).remove()
                        })
                })
        })
    </script>




<script>
    $(function myFunction() {
        $(".HeartAnimation").click(function() {
            $(this).toggleClass("animate");

        });
    });
</script>
@yield('script')

</body>

</html>
