<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

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
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <h1 class="text-primary">SCM Bulletin Board</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if(Auth::user()->type == 0 )
            <li class="nav-item px-3">
              <a class="nav-link text-primary" href="{{ url('user') }}">Users</a>
            </li>
            @endif
            <li class="nav-item px-3">
              <a class="nav-link text-primary" href="{{ route('user.show',Auth::user()->id) }}">User</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-primary" href="{{ url('/post') }}">Posts</a>
            </li>

            <li class="nav-item px-3">
              <a class="nav-link text-primary" href="">Contact</a>
            </li>
          </ul>
          <form class="d-flex ml-auto" method="POST" action="{{ route('logout') }}">
            <label for="" class="text-primary mt-2 font-weight-bold mr-3">{{ Auth::user()->name }} </label>
          </form>
          <div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </nav>
    <main class="py-4">
      @yield('content')
    </main>
    <div class="container-fluid mt-auto">
      <footer class="fixed-bottom">
        <div class="row bg-light">
          <div class="col-md-6 py-3 pl-5">
            <p class="text-primary"><b>Seattle Consulting Myanmar</b></p>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3 py-3">
            <p class="text-primary">seattleconsultingmyanmar&copy;copyright</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      var readURL = function(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('.avatar').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $(".file-upload").on('change', function() {
        readURL(this);
      });
    });
  </script>
</body>
</html>