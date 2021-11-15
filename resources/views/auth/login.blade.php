
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5 border col-8">
      {{-- <div class="row"> --}}
        <label>Log In</label>
      {{-- </div> --}}

      <form action="{{ route('login') }}" method="POST">
        @csrf
     
        <div class="form-group row">
            <div class="col-3">
                <label for="email">Email</label>
            </div>
            <div class="col-5">
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label for="password">Password</label>
            </div>
            <div class="col-5">
                <input type="text" id="password" name="password" class="form-control">
            </div>
        </div>
        <div class="form-group d-flex justify-content-center">
            <div class="items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>
            <a href="#" class="row">Register Now ?</a>
        </div>
      
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </form>
  </div>
</body>

