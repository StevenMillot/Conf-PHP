<ul>
    @if(!Auth::guest())
        <li><a href="{{url('/')}}">Go Home</a></li>
        <li><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('auth/logout')}}">logout</a></li>
    @else
        <li><a href="{{url('auth/login')}}">login</a></li>
    @endif
</ul>