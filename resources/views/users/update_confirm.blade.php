@extends('layouts.app')
@section('content')
  <div class="container py-3 mb-5">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h2 class="text-primary my-3">Update User Confirmation</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-6 mt-3">
        <form action="" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div>
          <img src="" class="avatar img-circle img-thumbnail rounded-circle mb-3" width="150px" height="150px"  alt="avatar">
          </div>
          <input type="hidden" id="id" name="id">
          <div class="form-group row">
             <label for="name" class="col-sm-4 col-form-label text-primary">Name :</label>
             <div class="col-sm-8">
               <input type="text"  class="font-weight-bold form-control border-0" id="name" name="name">
             </div>
          </div>
         <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-primary">Email Address :</label>
            <div class="col-sm-8">
            <input type="email"  class="font-weight-bold form-control border-0" id="email" name="email" >
            </div>
          </div>
          <input type="hidden" id="profile" name="profile" >
          <div class="form-group row">
            <label for="type" class="col-sm-4 col-form-label text-primary">Type :</label>
            <div class="col-sm-8">
              <input type="text"  class="font-weight-bold form-control border-0" id="type" name="type"  >
            </div>
         </div>
         <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label text-primary">Phone Number :</label>
          <div class="col-sm-8">
          <input type="number"  class="font-weight-bold form-control border-0" id="phone" name="phone" >
          </div>
        </div>
         <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label text-primary">Date of Birth :</label>
          <div class="col-sm-8">
            <input type="text" id="date" name="date" data-date-format="mm/dd/yyyy" class="font-weight-bold form-control border-0" >
          </div>
       </div>
       <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label text-primary">Address :</label>
          <div class="col-sm-8">
            <input type="text" id="address" name="address" class="font-weight-bold form-control border-0" >
          </div>
       </div>
         <button class="btn btn-primary my-3" type="submit">Confirm</button>
         <a href="" class="btn btn-outline-primary mx-3 px-3">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection