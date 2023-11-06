<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <img class="img-fluid" src="{{ asset('images/sos2.png') }}" alt="Theme-Logo" />
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <a href="#">
                        <small>Account</small>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="return logout(event);">
                                    <i class="ti-arrow-circle-left"></i> Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
