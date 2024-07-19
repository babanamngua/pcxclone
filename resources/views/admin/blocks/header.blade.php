<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('dashboard')}}"><span>BaBaNaMnGuA</span>Admin</a>
        <ul class="user-menu navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a style="color: black;" class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                        </form>
                    </div>
                </li>
                @else
                    <!-- If not logged in -->
                @endauth
            @endif
        </ul>
    </div>
</div>

<!-- CSS for custom dropdown -->
<style>
.nav-item .dropdown-menu {
    min-width: 8rem; /* Adjust width if necessary */
}
.dropdown-item {
    cursor: pointer;
}
</style>
