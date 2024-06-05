
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('dashboard')}}"><span>BaBaNaMnGuA</span>Admin</a>
        <ul class="user-menu">
            <li class="dropdown pull-right">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span style="color: white;">Xin chào, {{ Auth::user()->name }}</span><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('profile.edit')}}" style="width:158px;text-align:center;">{{ __('Profile') }}</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li>
                            <a href="">
                            <button type="submit" class="hEVBJWFW">{{ __('Log Out') }}</button>
                            </a>
                        </li>

                </ul>
            </li>
        </ul>
    </div>

</div><!-- /.container-fluid -->
