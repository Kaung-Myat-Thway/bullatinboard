@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      
@if(Session('message'))
    <div class="alert alert-dismissible alert-success my-5 show fade">
      {{ Session('message') }}  
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2>Bullatin<strong>Board</strong></h2>
            </div>
          </div>
          <form method="post" class="col-7" action="{{route ('contact.submit')}}">
              @csrf
          <div class="col-12">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" name="name" id="inputName" class="form-control"  placeholder="Your Name *" value="" />
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Your Email *" value="" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Phone</label>
              <input type="text" name="phone" id="inputSubject" class="form-control" placeholder="Your Phone Number *" value="" />
            </div>
            <div class="form-group">
              <label for="inputMessage">Message</label>
              <textarea name="msg" id="inputMessage" class="form-control" placeholder="Your Message *"rows="4"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
          </div>
          </form>
        </div>
      </div>

    </section>
    <!-- /.content -->
  
@endsection