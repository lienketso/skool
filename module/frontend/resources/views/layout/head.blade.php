<!-- Start Header Area  -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <div class="rbt-header-wrapper header-space-betwween header-transparent header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-start align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo">
                            <a href="{{route('frontend::home')}}">
                                <img src="{{ ($setting['site_logo']!='') ? upload_url($setting['site_logo']) : asset('frontend/histudy/assets/images/logo/logo.png')}}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">

                            <li class="">
                                <a href="{{route('frontend::home')}}">Trang chủ </a>
                                <!-- Start Mega Menu  -->
                            </li>

                            <li class="">
                                <a href="#">Giới thiệu
                                </a>

                            </li>

                            <li class="">
                                <a href="#">Hướng dẫn </a>
                                <!-- Start Mega Menu  -->
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li class="">
                                    <a class="" href="{{route('frontend::member.profile.get')}}">Xin chào !
                                        <strong>{{\Illuminate\Support\Facades\Auth::user()->full_name}}</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="" href="{{route('frontend::member.logout.get')}}">Logout</a>
                                </li>
                            @else
                            <li class="">
                                <a href="{{route('frontend::member.register.get')}}">Đăng ký</a>
                                <!-- Start Mega Menu  -->
                            </li>

                            <li class="">
                                <a href="{{route('frontend::member.login.get')}}">Đăng nhập </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none"
                           href="{{(\Illuminate\Support\Facades\Auth::user()) ? route('frontend::group.create-room.get') : route('frontend::member.register.get')}}">
                            <span data-text="Tạo nhóm ngay">Tạo nhóm ngay</span>
                        </a>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area  -->

<!-- Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <a href="{{route('frontend::home')}}">
                        <img src="{{ ($setting['site_logo']!='') ? upload_url($setting['site_logo']) : asset('frontend/histudy/assets/images/logo/logo.png')}}"
                             alt="Education Logo Images">
                    </a>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <p class="description">Trang website cộng đồng dành cho kênh đào tạo</p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li>
                    <a href="mailto:thanhan1507@gmail.com"><i class="feather-mail"></i>trikivn@gmail.com</a>
                </li>
                <li>
                    <a href="#"><i class="feather-phone"></i>0979 823 452</a>
                </li>
            </ul>
        </div>

        <nav class="mainmenu-nav">
            <ul class="mainmenu">
                <li class="">
                    <a href="{{route('frontend::home')}}">Trang chủ</a>
                </li>

                <li class="">
                    <a href="#">Giới thiệu</a>
                </li>

                <li class="">
                    <a href="#">Hướng dẫn</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user())
                    <li class="">
                        <a class="" href="{{route('frontend::member.profile.get')}}">Xin chào !
                            <strong>{{\Illuminate\Support\Facades\Auth::user()->full_name}}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('frontend::member.logout.get')}}">Logout</a>
                    </li>
                @else
                    <li class="">
                        <a href="{{route('frontend::member.register.get')}}">Đăng ký</a>
                        <!-- Start Mega Menu  -->
                    </li>

                    <li class="">
                        <a href="{{route('frontend::member.login.get')}}">Đăng nhập </a>
                    </li>
                @endif
            </ul>
        </nav>

        <div class="mobile-menu-bottom">
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                   href="{{(\Illuminate\Support\Facades\Auth::user()) ? route('frontend::group.create-room.get') : route('frontend::member.register.get')}}">
                    <span>Tạo nhóm ngay</span>
                </a>
            </div>

            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Tìm chúng tôi</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="https://www.facebook.com/">
                            <i class="feather-facebook"></i>
                        </a>
                    </li>
                    <li><a href="https://www.twitter.com">
                            <i class="feather-twitter"></i>
                        </a>
                    </li>
                    <li><a href="https://www.instagram.com/">
                            <i class="feather-instagram"></i>
                        </a>
                    </li>
                    <li><a href="https://www.linkdin.com/">
                            <i class="feather-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Mobile Area  -->
