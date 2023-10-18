<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img src="{{ asset('images/user.png') }}" alt="User-Profile-Image" style="width: 20%; height: 20%;">
                <div class="user-details">
                    @if (auth()->user()->role_id == 1)
                        <span>{{ auth()->user()->username }}</span>
                        <span>{{ auth()->user()->role->name }}</span>
                    @else
                        <span>{{ auth()->user()->username }}</span>
                        <span>SOS {{ auth()->user()->city->city_name }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="pcoded-navigatio-lavel">Data Master</div>
        @if (auth()->user()->role_id == 1)
            @include('slice2.admin-sidebar')
        @else
            @include('slice2.user-sidebar')
        @endif
    </div>
</nav>
