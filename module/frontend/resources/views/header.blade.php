<header class="main-header navbar-light header-sticky header-sticky-smart">

    <div class="container">
        <div class="header-menu">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="javascript:void(0)"><img src="{{upload_url($setting['site_logo'])}}" alt="Skool việt nam"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Hướng dẫn</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend::member.profile.get')}}">Xin chào ! <strong>{{\Illuminate\Support\Facades\Auth::user()->full_name}}</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend::member.logout.get')}}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend::member.register.get')}}">Đăng ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend::member.login.get')}}">Đăng nhập</a>
                            </li>
                        @endif
                    </ul>

                </div>
            </nav>
        </div>
    </div>

</header>
