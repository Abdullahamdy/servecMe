@extends('frontend.layout.head_foot')

@section('content')


{{--    هناك حقيقة مثبتة منذ زمن--}}
{{--    طويل وهي أن المحتوى المقروء--}}
{{--    لصفحة ما سيلهي القارئ عن--}}
{{--    التركيز على الشكل الخارجي--}}
{{--    للنص أو شكل توضع الفقرات في--}}
{{--    الصفحة التي يقرأها.--}}


<!------------------------ End header Section ----------------------------->

<!------------------------ Start content Section --------------------------->
<main>
    <!--=====  Start About Section  =====-->

    <div id="about" class="about__container">
        <div class="about__content container">
            @inject('who_are','App\Models\WhoAre')
            @foreach($who_are->get() as $whoAre)
                @foreach($whoAre->image as $img)

                <div class="row">
                <div class="about__content-details col-md-6 col-xs-12">
                    <div class="about__title">
                        <h1 class="heading">مـن نـحـن ؟</h1>
                    </div>
                    <div class="about__text">
                        <p>
                            {{$whoAre->message}}
                        </p>
                    </div>
                    <div class="btn__group btn__download">
                        <a href="#">
                            <i class="fab fa-google-play"></i> Google
                            Play
                        </a>
                        <a href="#">
                            <i class="fab fa-apple"></i> App Store
                        </a>
                    </div>
                </div>
                <div class="about__content-img col-md-6 col-xs-12">
                    <img src="{{asset("Accessories/WhoAre/".$img->filename)}}" alt="" />
                </div>
            </div>
            @endforeach
            @endforeach

        </div>
    </div>
    <!--=====  End About Section  =====-->

    <!--=====  Start Features Section  =====-->
    <div id="features" class="features__container">
        <div class="container">
            <div class="features">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="feature__details">
                            <h2 class="heading">مميزات التطبيق</h2>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام . </p>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="owl-carousel owl-theme feature__carousel" dir="ltr">
@inject('app_feature','App\Models\ApplicationFeature')
                            @foreach($app_feature->get() as $features)
                            <div class="item">
                                <div class="feature">
                                    <div class="feature__img">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23.548" height="23.542" viewBox="0 0 23.548 23.542">
                                            <path
                                                id="Path_14590"
                                                data-name="Path 14590"
                                                d="M-241.977-4886.705l-4.2-4.206a.839.839,0,0,1,0-1.168.841.841,0,0,1,1.189-.021l2.769,2.77V-4901.6a.841.841,0,0,1,.842-.84.84.84,0,0,1,.84.84v12.269l2.771-2.77a.843.843,0,0,1,1.169,0,.841.841,0,0,1,.02,1.189l-4.2,4.206s0,0,0,0a.841.841,0,0,1-.6.246A.838.838,0,0,1-241.977-4886.705Zm3.959-6.481a.842.842,0,0,1-.842-.842.841.841,0,0,1,.842-.84h2.524a3.37,3.37,0,0,0,2.795-1.5,3.363,3.363,0,0,0-.944-4.663.841.841,0,0,1-.346-.925c.043-.16.078-.323.1-.487a5.04,5.04,0,0,0-4.145-5.8,5.042,5.042,0,0,0-5.8,4.145.839.839,0,0,1-.232.456.84.84,0,0,1-1.189.009,1.677,1.677,0,0,0-1.174-.48,1.681,1.681,0,0,0-1.684,1.679.841.841,0,0,1-.842.84,3.365,3.365,0,0,0-3.364,3.364,3.365,3.365,0,0,0,3.364,3.365h4.206a.84.84,0,0,1,.84.84.841.841,0,0,1-.84.842h-4.206a5.048,5.048,0,0,1-4.993-4.3,5.048,5.048,0,0,1,4.245-5.737,3.369,3.369,0,0,1,.145-.458,3.364,3.364,0,0,1,4.37-1.881,6.728,6.728,0,0,1,6.318-4.435,6.729,6.729,0,0,1,6.737,6.72,6.678,6.678,0,0,1-.111,1.193,5.046,5.046,0,0,1,1.788,3.848,5.048,5.048,0,0,1-5.041,5.052Z"
                                                transform="translate(254 4910)"
                                                fill="#474747"
                                            />
                                        </svg>
                                        <h3>
                                            {{$features->tittle}}
                                        </h3>
                                    </div>
                                    <div class="feature__text">
                                        <p>
                                         {{$features->message}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====  End Features Section  =====-->

    <!--=====  Start App Screen Section  =====-->
    <div id="app-screen" class="app-screen__container">
        <div class="container">
            <div class="app-screen__header">
                <h2>شاشات التطبيق</h2>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء
                    لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                    للنص
                </p>
            </div>
        </div>
        <div class="app-screen">
            <div class="container">
                <div class="owl-carousel" dir="ltr">






@foreach($screens as $screen)
    @foreach($screen->image as $img)
                            <div>
                                <img src="{{asset("Accessories/applicationScreen/".$img->filename)}}" alt="" />
                            </div>

                        @endforeach
                        @endforeach



                </div>
                <div class="mobile__frame">
                    <img src="{{asset("assets/images/mockup.png")}}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!--=====  End App Screen Section  =====-->

    <!--=====  Start Email Section  =====-->
    <div class="email__container">
        <div class="container">
            <div class="email__content">
                <h2>القائمة البريدية</h2>
                <p>اشترك في القائمة البريدية ليصلك جديدنا</p>
                <form method="post" action="/subscripe">
                    @csrf
                    <input
                        class="email__inp"
                        type="text"
                        placeholder="بريدك الإلكترونى"
                        name="email"
                    />
                    <input
                        class="btn__submit"
                        type="submit"
                        value="إشتراك"
                    />
                </form>
            </div>
        </div>
    </div>
    <!--=====  End Email Section  =====-->
</main>
<!------------------------ End content Section ----------------------------->

<!------------------------ Start footer Section --------------------------->
@endsection
