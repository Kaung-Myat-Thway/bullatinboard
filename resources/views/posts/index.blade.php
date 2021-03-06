@extends('layouts.app')
@section('content')
<div class="container mb-5 pb-5">
  <div class="row">
    <div class="col-12 py-3">
      <h3 class="text-dark">Post List</h3>
    </div>
  </div>
  <div class="row mb-3">
    <form action="{{ route('post.search') }}" method="GET" class="col-lg-5 col-md-12 col-sm-12 py-2 row">
      <div class="col-8"> <input type="text" name="search" class="form-control" placeholder="Search Post here..." required /></div>
      <button type="submit" class="btn btn-primary col-4"><i class=" fas fa-search "></i>Search</button>
    </form>
    <div class="col-lg-7 col-md-12 col-sm-12 py-2 row">
    <div class="col-4  p-auto ">
      <a href="{{ route('post.create')}}" class="btn btn-outline-primary px-5 w-100"><i class=" fas fa-plus"></i>Add</a>
    </div>
    <div class="col-4  p-auto">
      <a href="{{ url('/excel')}}" class="btn btn-outline-primary px-4 w-100"><i class=" fas fa-upload"></i>Upload</a>
    </div>
    <div class="col-4 p-auto">
      <form action="{{ route('export') }}" method="GET">
        <input type="search" name="search" id="search-input" class="form-control m-auto" hidden />
        <button type="submit" class="btn btn-outline-primary px-3 w-100" id="download-button"><i class="  fas fa-download"></i>Download</button>
      </form>
    </div>
    </div>
  </div>
  @if(Session('message'))
  <div class="alert alert-dismissible alert-success show fade">
    {{ Session('message') }}
    <button class="close" data-dismiss="alert">&times;</button>
  </div>
  @endif
  <div class="row">
    <div class="col-12">
      <table class="table mt-3 table-striped text-primary bg-white shadow" id="table">
        <thead class="bg-gradient-primary text-light">
          <tr>
            <th>No.</th>
            <th>Post Title</th>
            <th>Post Description</th>
            <th>Posted User</th>
            <th>Posted Date</th>
            <th colspan=2 class="noExport">Actions</th>
          </tr>
        </thead>

        @php
        $i=1;
        @endphp
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td class="text-dark">{{$i++}}</td>
            <td><a href="" class="modal-lg text-link" data-toggle="modal" data-target="#post{{$post->id}}">{{$post->title}}</a>
              <!-- Show post modal -->
              <div class="modal fade" id="post{{$post->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-light">
                      <h4 class="modal-title text primary font-weight-bold " id="customerCrudModal-show">Post Detail</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                          @if(isset($post->id))
                          <form action="">
                            <div class="form-group row">
                              <label for="title" class="col-sm-4 col-form-label text-primary">Title :</label>
                              <div class="col-sm-7">
                                <input type="text" class="text-primary font-weight-bold form-control border-0" id="title" name="title" value="{{ $post->title }}" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="description" class="col-sm-4 col-form-label text-primary">Description :</label>
                              <div class="col-sm-7">
                                <input type="text" class="text-primary font-weight-bold form-control border-0" id="description" name="description" value="{{ $post->description }}" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="user" class="col-sm-4 col-form-label text-primary">Posted User :</label>
                              <div class="col-sm-7">
                                <input type="text" class="text-primary font-weight-bold form-control border-0" id="user" name="user" value="{{$post->user['name']}}" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="date" class="col-sm-4 col-form-label text-primary">Posted Date :</label>
                              <div class="col-sm-7">
                                <input type="text" class="text-primary font-weight-bold form-control border-0" id="date" name="date" value="{{ $post->created_at->format('Y/m/d') }}" disabled>
                              </div>
                            </div>
                          </form>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-light">
                      <div class="float-right">
                        <a href="{{ route('post.index') }}" class="btn btn-primary">Close</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td class="text-dark">{{$post->description}}</td>
            <td class="text-dark">{{$post->user['name']}}</td>
            <td class="text-dark">{{$post->created_at->format('Y/m/d')}}</td>
            <td>
            <a href="{{ route('post.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-danger delete btn-sm" data-toggle="modal" data-target="#deleteModal{{$post->id}}"><i class="fas fa-trash"></i>Delete</a>
              <!-- Delete Modal -->
              <div class="modal modal-danger fade" id="deleteModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-gradient-danger">
                      <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">Delete Post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-center text-danger">Are you sure you want to delete this post?</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Delete Modal -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{ $posts->appends(Request::get('page'))->links()}}
</div>
@endsection