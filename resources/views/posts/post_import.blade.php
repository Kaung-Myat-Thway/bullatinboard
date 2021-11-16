@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row my-5 offset-2">
        <h2>Upload CSV</h2>
    </div>
    {{-- <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header border-0 background-transparent">
                    Import File From
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('post.import') }}">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose CSV</label>
                            <input type="file" name="file" class="form-control" id=""/>
                        </div>
                        <button type="submit" class="bnt bnt-primary offset-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        
            <h3>Import File From:</h3>
            <div class="card bg-light mt-3">
            <div class="card-body  ml-4">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <label for="file">Example file input</label> --}}
                    <input type="file" class="form-control-file" id="file" name="file">
                    {{-- <input type="file" name="file" class="form-control"> --}}
                   
                    <br>
                    <button class="btn btn-primary">Import File</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>

@endsection