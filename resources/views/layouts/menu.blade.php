<!-- need to remove -->
@if(Auth::user()->type == 0 )
<li class="nav-item">
    <a href="{{ url('user') }}" class="nav-link">
    <i class="fas fa-user-tag"></i>
        <p> Users</p>
    </a>
</li>
@endif

<li class="nav-item">
    <a href="{{ route('user.show',Auth::user()->id) }}" class="nav-link">
    <i class="fas fa-user"></i></i>
        <p>User</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/post') }}" class="nav-link">
    <i class="fas fa-clipboard"></i>
        <p>Posts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/contact') }}" class="nav-link">
    <i class="fas fa-envelope"></i>
        <p>Contact</p>
    </a>
</li>
