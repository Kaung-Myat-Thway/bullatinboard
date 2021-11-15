@extends('layouts.app')
@section('content')
<div class="container m-auto">
  <div class="row mt-5 mb-auto">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h2 class="text-primary font-weight-bold">Create Post</h2>
    </div>
  </div>
  <div class="row my-4">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-light p-5">
      <form action="{{url('posts/confirm')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label text-primary">Title :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title ?? old('title') }}">
            @error('title')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
          <span class="asterisk_input"> </span>
        </div>
        <br>
        <div class="form-group row">
          <label for="description" class="col-sm-3 col-form-label text-primary">Description :</label>
          <div class="col-sm-8">
            <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $post->description ?? old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
          <span class="asterisk_input"> </span>
        </div> <br>
        <div class="float-right mr-5">
          <button type="reset" class="btn btn-outline-primary m-2 px-3">Clear</button>
          <button type="submit" class="btn btn-primary my-2 mr-2">Confirm</button>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection