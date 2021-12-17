@extends('frontend.layout.header')
@section('content')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/homePage.css")}}">
<link rel="stylesheet" href="{{asset("frontend/css/animate.css")}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

{{-- <div name="q" class="list-group list-group-flush search-result">

    <a href="" class="form-group-item"></a>


</div> --}}

    <!--End Navbar-->
    <!-- Start slideBar -->

            <div class="col-md-10 ">
                <div class="search">
                    <input class="form-control me-2 search-input" type="search" placeholder="ابحث" aria-label="Search">

                </div>


                <div class="col-md-10 ">

                <div name="q" class="list-group list-group-flush search-result">

                    <a href="" class="form-group-item"></a>


                </div>
            </div>


                <div class="content">
                    <p class="h1">
                        عروض
                    </p>


                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($advertisings as $key => $slider)
                            @foreach($slider->image as  $img)

                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <img src="{{url('Accessories/advertising', $img->filename)}}" class="d-block w-100"  alt="...">
                            </div>
                            @endforeach
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>







                    <p class="h2"> المنتجات الاكثر مبيعا</p>

                </div>

                <section id="hideElement">
                    <div class="col-md-10 firstContainer">
                        @foreach($products as $product)
                        @foreach ($product->image as $img)
                        {{-- @dd($img->filename) --}}
                        <div class="card wow bounceInDown" data-wow-duration="2s" data-wow-delay="3s" data-wow-offset="100" style="width: 13rem;">
                            <img class="card-img-top" src="{{asset("Accessories/products/".$img->filename)}}" alt="">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> {{$product->price}} <br>
                                    <a href="{{ url('far/'. $product->id) }}">
                                        @if ($product->isFavorited())
                                        <i class="fa fa-heart" style="font-size:36px;color:red"></i>
                                        @else
                                        <i class="fa fa-heart" style="font-size:36px;color:rgb(151, 147, 147)"></i>

                                        @endif

                                        

                                        <a>
                                </p>
                                <button class="btn "><a href="{{route('addcart',$product->id)}}"style="text-decoration:none;color:white">اضف الى السلة</a></button>
                            </div>
                        </div>

                        @endforeach
                        @endforeach
                    </div>
                    <a class="showMore" href="moresales.html"> عرض المزيد</a>
                    <p class="h2 khasm">خصومات</p>
                    <div class="col-md-10 firstContainer">
                        @foreach($productdiscount as $discount)

                        @foreach ($discount->image as $img)
                        <div class="card wow bounceInDown" data-wow-duration="2s" data-wow-delay="3s" data-wow-offset="100" style="width: 13rem;">
                            <img class="card-img-top" src="{{asset("Accessories/products/".$img->filename)}}" alt="">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> {{$discount->price}} <br>
                                   <a href="{{ url('far/'. $discount->id) }}">
                                    @if ($discount->isFavorited())
                                    <i class="fa fa-heart" style="font-size:36px;color:red"></i>
                                    @else
                                    <i class="fa fa-heart" style="font-size:36px;color:rgb(151, 147, 147)"></i>

                                    @endif



                                    <a>
                                </p>
                                <button class="btn "><a href="{{route('addcart',$discount->id)}}"style="text-decoration:none;color:white">اضف الى السلة</a></button>
                            </div>
                        </div>

                        @endforeach
                        @endforeach

                    </div>
                    <a class="showMore" href="khosomat.html"> عرض المزيد</a>
                </section>
                <section id="gomla">
                    <div class="col-md-10 firstContainer">
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/24-colors-portable-telescopic-finger-strap.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/Component 18 – 1.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/offer12.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 firstContainer">
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/2.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <button type="submit" href="#">  <i type="button" id="icon_7" class="HeartAnimation"></i></button>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/24-colors-portable-telescopic-finger-strap.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                <button type="submit" href="#">    <i type="button" id="icon_7" class="HeartAnimation"></i></button >
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/Component 18 – 1.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                        <div class="card" style="width: 13rem;">
                            <img src="{{asset("frontend/img/offer12.png")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">سماعة بلوتوث</h5>
                                <p class="card-text"> 120جنيه <br> <span> 150 جنيه</span>
                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                </p>
                                <button class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End slideBar -->
    <div class="loading-overlay">
        <img src="{{asset("frontend/img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png")}}" alt="">
        <p class="h1">جرب معنا متعه التسويق </p>

    </div>
    <!--Start Footer-->
@endsection


@section('script')
<script>
 $(document).ready(function(){
     $('.search-input').on('keyup',function(){
         var _q = $(this).val()
         if(_q.length>=3){
             $.ajax({
                 url:"{{url('productsearch')}}",
                 data:{
                     q:_q,
                 },

                 dataType:'json',
                 beforeSend:function(){
                     $(".search-result").html("<a href= '' class='list-group-item'>loading...</a>")

                 },
             success:function(res){
                var _html = '';
                $.each(res.data,function(index,data){





                    _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.name+'</a>';

                });

                $(".search-result").html(_html);

             },

             });
         }
     })

 })

</script>
@endsection
