@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 my-5 mx-auto">
      <!-- general form elements -->
      <div class="card card-primary rounded shadow bg-white">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">Confirm Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('post.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" value="{{ $post['title'] }}" class="form-control  bg-white" readonly>
              @error('title')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="{{ $post['description'] }}" class="form-control  bg-white" readonly>
              @error('description')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-gruop">
              <input type="checkbox" class="form-control" id="status" name="status" value="1" checked hidden>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="javascript:history.back()" type="button" class="btn btn-danger">Back</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
</div>
@endsection