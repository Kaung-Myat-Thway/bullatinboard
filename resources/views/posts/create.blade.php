@extends('layouts.app')
@section('content')
<div class="container m-auto">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">Create Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('posts/confirm')}}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" placeholder="Post Title Here" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title ?? old('title') }}">
              @error('title')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $post->description ?? old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="reset" class="btn btn-danger">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card -->




    </div>
  </div>
</div>
@endsection