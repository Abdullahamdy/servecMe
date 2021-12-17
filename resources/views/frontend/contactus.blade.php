@extends('frontend.authClient.layout.header')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/contact.css")}}">

@endsection

@section('content')


<form action="contact-us"method="post">
    @csrf
<div class="container">
    <div class="row">
        <div class="col-md-6 contact">
            <p class="h2"> اتصل بنا
            </p>


            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الالكتروني"name="email" value="{{auth()->user()->email}}">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="message" placeholder="رسالتك">
            <button type="submit" class="btn"> ارسال</button>
        </div>
        <div class="col-md-6">
            <img src="{{asset("frontend/img/Call center.png")}}" alt="">
        </div>
    </div>
</div>
</form>
@endsection
