<!-- need to remove -->
@if(Auth::user()->type == 0 )
<li class="nav-item">
    <a href="{{ url('user') }}" class="nav-link">
    <i class="fas fa-user-tag"></i>
        <p> {{__('messages.users')}}</p>
    </a>
</li>
@endif

<li class="nav-item">
    <a href="{{ route('user.show',Auth::user()->id) }}" class="nav-link">
    <i class="fas fa-user"></i></i>
        <p>{{__('messages.user')}}</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/post') }}" class="nav-link">
    <i class="fas fa-clipboard"></i>
        <p>{{__('messages.post')}}</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/contact') }}" class="nav-link">
    <i class="fas fa-envelope"></i>
        <p>{{__('messages.contact')}}</p>
    </a>
</li>
