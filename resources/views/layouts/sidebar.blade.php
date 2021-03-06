<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
    <img src="/img/logo.jpg" alt="Bullatin Board Logo" class="brand-image  elevation-3" >
        <span class="brand-text font-weight-light">Bullatin Board</span>
    </a>
   

    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/{{ Auth::user()->profile }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.show',Auth::user()->id) }}" class="d-block text-light">{{ Auth::user()->name }}</a>
        </div>
      </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
