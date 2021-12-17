@extends('frontend.layout.head_foot')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"  style="margin-top: 5%;
    margin-bottom: 5%;">

    <form method="post" action="/contact-us">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputMessage">Message</label>
    <input type="text" name="message"class="form-control" id="exampleInputMessage" placeholder="Your Message">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    </div>
</div>

@endsection
