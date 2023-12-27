@extends('frontend::layout.master')

@section('js-init')
@endsection

@section('content')

    <!-- Start Slider Area  -->
    <div class="rbt-splash-slider d-flex align-items-center">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-xl-6 order-2 order-xl-1">
                        <div class="inner">
                            <div class="banner-top">
                                <div class="banner-badge-top">

                                    <span class="subtitle">1500+ Người dùng</span>
                                </div>

                                <div class="banner-badge-top">
                                    <span class="subtitle">5000+ Khóa học</span>
                                </div>
                            </div>
                            <h1 class="title">Tạo nhóm cộng đồng của bạn
                                <span class="cd-headline slide">
                                    <span class="cd-words-wrapper">
                                        <b class="is-hidden theme-gradient">Khóa học online</b>
                                        <b class="is-visible theme-gradient">Chia sẻ cộng đồng</b>
                                        <b class="is-hidden theme-gradient">Kiếm tiền online.</b>
                                        <b class="is-hidden theme-gradient">Tạo giá trị</b>
                                        <b class="is-hidden theme-gradient">Xây dựng cộng đồng</b>
                                        <b class="is-hidden theme-gradient">Kết hữu bạn bè</b>
                                    </span>
                                </span>
                            </h1>
                            <p class="description">Một phần cộng đồng, một phần trò chơi, một phần <strong>kinh doanh</strong>, một phần <strong>học tập</strong>. Kiếm sống mang mọi người lại với nhau để cộng tác trên các mục tiêu và sở thích chung. Kết bạn, hangout, kiếm tiền và vui chơi!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 order-1 order-xl-2">
                        <div class="video-popup-wrapper">
                            <img class="w-100 rbt-radius" src="{{asset('frontend/histudy/assets/images')}}/splash/banner-group-image.png" alt="Video Images">
                            <a class="rbt-btn rounded-player-2 popup-video position-to-top with-animation d-none" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                                <span class="play-icon"></span>
                            </a>
                            <div class="banner-group-shape">
                                <div class="shape-image scene shape-4">
                                    <span data-depth="2">
                                        <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-4.png" alt="Shape Images">
                                    </span>
                                </div>
                                <div class="shape-image scene shape-5">
                                    <span data-depth="-2">
                                        <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-5.png" alt="Shape Images">
                                    </span>
                                </div>
                                <div class="shape-image scene shape-6">
                                    <span data-depth="5">
                                        <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-6.png" alt="Shape Images">
                                    </span>
                                </div>
                                <div class="shape-image scene shape-7">
                                    <span data-depth="-3">
                                        <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-7.png" alt="Shape Images">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="splash-service-main position-relative">
                            <div class="service-wrapper service-white">
                                <div class="row g-0">
                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{asset('frontend/histudy/assets/images')}}/icons/icons-01.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Hiệu suất nhanh</h4>
                                                <p>Được tối ưu hóa cho kích thước bản dựng nhỏ hơn, biên dịch nhà phát triển nhanh hơn và hàng tá cải tiến khác.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{asset('frontend/histudy/assets/images')}}/icons/icons-02.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Đáp ứng hoàn hảo</h4>
                                                <p>Trang web của chúng tôi hoàn toàn hoàn hảo cho mọi thiết bị. Bạn có thể truy cập tất cả trang web của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{asset('frontend/histudy/assets/images')}}/icons/icons-03.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Nhanh &amp; Hỗ trợ thân thiện</h4>
                                                <p>Chúng tôi cung cấp hỗ trợ 24 giờ cho tất cả khách hàng. Bạn có thể thanh toán mà không cần do dự.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{asset('frontend/histudy/assets/images')}}/icons/icons-04.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Dễ sử dụng</h4>
                                                <p>Các chức năng dễ dàng sử dụng, dễ dàng đăng ký sử dụng chỉ trong vài bước đơn giản</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="shape-wrapper">
            <div class="shape-image shape-1">
                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-1.png" alt="Shape Images">
            </div>
            <div class="shape-image shape-2">
                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-2.png" alt="Shape Images">
            </div>
            <div class="shape-image shape-3">
                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/shape-3.png" alt="Shape Images">
            </div>
        </div>
    </div>
    <!-- End Slider Area  -->

    <!-- Start Coding Quality Area  -->
    <div class="rbt-splash-coding-quality-area bg-color-white rbt-section-gapBottom">
        <div class="wrapper">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-secondary-opacity">Tất cả trong một</span>
                            <h2 class="title">Tại sao chọn Triki</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-15">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">Cho khóa học online</span>
                                    <h4 class="title">Nền tảng website hỗ trợ mạnh mẽ</h4>
                                </div>
                                <div class="thumbnail">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/topfeature/01.png" alt="Image">
                                </div>

                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/sun-shadow-right.png" alt="Shape Images">
                            </div>
                        </div>
                    </div>
                    <!-- End Top Feature  -->

                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-16">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">Cho giáo dục hoặc trường học</span>
                                    <h4 class="title">Dễ dàng tạo các khóa học không giới hạn</h4>
                                </div>

                                <div class="thumbnail">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/topfeature/02.png" alt="Image">
                                </div>

                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/sun-shadow-right-2.png" alt="Shape Images">
                            </div>
                        </div>
                    </div>
                    <!-- End Top Feature  -->

                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-17">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">Dành cho huấn luyện chuyên nghiệp </span>
                                    <h4 class="title">Tạo cộng đồng huấn luyện, học tập , chia sẻ</h4>
                                </div>

                                <div class="thumbnail">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/topfeature/03.png" alt="Image">
                                </div>


                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/sun-shadow-right-3.png" alt="Shape Images">
                            </div>
                        </div>
                    </div>
                    <!-- End Top Feature  -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Coding Quality Area  -->


    <!-- Start Campain Area  -->
    <div class="rbt-buy-now-area bg-gradient-8 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-buy-now-content text-center">
                        <h2 class="title color-white">Mọi thứ bạn cần để xây dựng cộng đồng và kiếm tiền trực tuyến.</h2>
                        <h4 class="subtitle color-white">Làm việc thông minh ☕ Sáng tạo ⭐ Nhanh chóng ⚡</h4>

                        <a class="rbt-btn btn-white radius hover-icon-reverse btn-xl"
                           href="{{(\Illuminate\Support\Facades\Auth::user()) ? route('frontend::group.create-room.get') : route('frontend::member.register.get')}}">
                            <span class="icon-reverse-wrapper">
                                <span class="btn-text">Tạo cộng dồng ngay</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </span>
                        </a>

                        <span class="label-text color-white d-block text-uppercase">Bạn sẽ kiếm tiền tại Triki thế nào ?</span>
                    </div>

                    <div class="rbt-bebefit-list">
                        <div class="single-bebefit">
                            <div class="icon">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/benefit-01.png" alt="Splash Images">
                            </div>
                            <h6 class="title">Miễn phí cập nhật <br> trọn đời</h6>
                        </div>
                        <div class="single-bebefit">
                            <div class="icon">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/benefit-02.png" alt="Splash Images">
                            </div>
                            <h6 class="title">Hỗ trợ cao cấp <br> 6 tháng miễn phí</h6>
                        </div>
                        <div class="single-bebefit">
                            <div class="icon">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/benefit-03.png" alt="Splash Images">
                            </div>
                            <h6 class="title">Hiệu suất <br> tốc độ cao</h6>
                        </div>
                        <div class="single-bebefit">
                            <div class="icon">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/benefit-04.png" alt="Splash Images">
                            </div>
                            <h6 class="title">Chúng tôi đã cung cấp phí <br> bảo hiểm  </h6>
                        </div>
                        <div class="single-bebefit">
                            <div class="icon">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/benefit-05.png" alt="Splash Images">
                            </div>
                            <h6 class="title">Thân thiện với <br> người dùng</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="map-image">
            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/map.png" alt="Map Image">
        </div>
    </div>
    <!-- End Campain Area  -->

    <!-- Start Feature List Area  -->
    <div class="rbt-splash-fetaure-list-area bg-color-white rbt-section-gap top-circle-shape-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title"><span class="theme-gradient">Tất cả</span> những khóa học mà bạn cần</h2>
                        <p class="description has-medium-font-size mt--20">Danh sách những khóa học tiêu biểu tại hệ thống đào tạo trực tuyến Triki, đa dạng lĩnh vực, ngành nghề</p>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--30">

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-gradient-3 color-white">
                        <div class="inner">
                            <div class="content">
                                <p class="description"><strong>Complete Education Package.</strong> <br>
                                    A complete education package for build any type of education website.</p>
                            </div>
                            <div class="thumbnail text-end">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-03.png" alt="Education Fetaure">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="170" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-gradient-11">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-08.png" alt="Education Fetaure">
                            </div>
                            <div class="content">
                                <p class="description"><strong>Amazing Courses</strong>
                                    Have a lots of course layout options for creating a online education website.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->


                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="180" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-04.png" alt="Education Fetaure">
                            </div>
                            <div class="content">
                                <p class="description"><strong>Sass Available.</strong> The tamplate has Sass available for css. You can Change
                                    css by sass.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-color-black color-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-01.jpg" alt="Education Fetaure">
                            </div>
                            <div class="content">
                                <p class="description"><strong>Perfect Responsive.</strong> Our Template is full Perfect for all device. You can visit our template all device easily.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-8 col-md-6 col-sm-6 col-12" data-sal-delay="220" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box space-between-align">
                        <div class="inner">
                            <div class="content">
                                <h3 class="theme-gradient">Fast Loading Speed.</h3>
                                <p class="description">Histudy is faster loading speed. Histudy create your template so much faster.</p>
                            </div>
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-06.png" alt="Education Fetaure">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="240" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-color-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-05.png" alt="Education Fetaure">
                            </div>
                            <div class="content">
                                <p class="description"><strong>Bootstrap5 Comfortable.</strong> Bootstrap5 comfortable is available in Histudy. So layout
                                    changes is so much easily.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="260" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-gradient-14 color-white">
                        <div class="inner">
                            <div class="content">
                                <p class="description"><strong>Freedom to Create The LMS Platform You Want</strong> By following Histudy layout you can create a LMS Platform as you like.</p>
                            </div>
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-09.png" alt="Education Fetaure">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

                <!-- Start Feature Box  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="280" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box color-white card-bg-6">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/feature/feature-07.png" alt="Education Fetaure">
                            </div>
                            <div class="content">
                                <p class="description"><strong>Well Documentation.</strong> Have a Well organized documentation and up to date is histudy.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Box  -->

            </div>
        </div>
    </div>
    <!-- End Feature List Area  -->

    <!-- Start Testimonial Area  -->
    <div class="rbt-splash-testimonial-area bg-color-white overflow-hidden position-relative">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title">Cảm nhận <br> người dùng về
                                <span class="header-caption">
                                    <span class="cd-headline zoom">
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible theme-gradient">Triki</b>
                                            <b class="is-hidden theme-gradient">Lienketso</b>
                                        </span>
                                </span>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="splash-testimonial-all-wrapper pb--60">

            <div class="scroll-animation-wrapper no-overlay mt--50">
                <div class="scroll-animation scroll-right-left">

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3"><strong>Beautiful theme!</strong> (Of course, that’s why I got it). But most
                                        importantly, thank you for the quick responses from your customer support. I was
                                        finding it hard to install and customise the demo but he guided</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">teechelle</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3"><strong>The design Quality is perfect!</strong> Customer Support is the best so
                                        far. Thank you!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">3anbo3d</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The theme itself suits my needs, but the support is the superstar
                                        that earns this theme and the team behind <strong>it a 5 stars rating</strong>. Kudos!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">arikurnia1</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">I needed support on a issue to install the theme demo, the CS team is super efficient, they <strong>fixed the issue in few hours.</strong> Thank you!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">stephanieprugne</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3"><strong>Awesome Customer support.</strong> Fixed issues in less than 24 Hours. Very professional and prompt.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">taggrwal</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">These guys are the REAL deal. Fantastic website and even <strong>better customer support</strong>. Highly recommend and will work with them again.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">phil148</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The theme itself suits my needs, but the support is the superstar that earns this theme and the team behind it a <strong>5 stars rating</strong>. Kudos!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">arikurnia1</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">I can only <strong>recommend the theme!</strong> Very nice design, good adjustment options.The support is very friendly and incredibly helpful. Thanks!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">timofk</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The theme is awesome,and the support it's just fantastic, solved my problems in few hours.5 stars are not enough</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">alesmp82</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>
            </div>

            <div class="scroll-animation-wrapper no-overlay mt--30">
                <div class="scroll-animation scroll-left-right">

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">They assist me very well and did everything I asked !
                                        Quick answer to <strong>So yes I recommand :)</strong></p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">saverysyoann</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">I have zero experience with web design and found this template super easy to use. Very helpful support team too.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">thomasmcbrien00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">they was so kindly and replay so fast and they fixed all what i want, thank you so much !</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">ordersgate</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3"><strong>Responsive and competent support.</strong> They perfectly answer the questions of use and the various problems that one can have. A big thank-you !</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">couletcorentin</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">They are really amazing, the customization is really dope, and Support is really awesome</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">rohithaditya</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">One of the best support and clean code on codecanyon! <strong>Highly recommended!</strong></p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">neosofts</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">I have never seen support as fast and efficient as this one.
                                        I can't say anything about the theme yet since I just started building the site, but with this kind of support, <strong>I am confident it will be awesome</strong>.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">desdizajn</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The customer support for this theme is top notch. They have been on the ball answering my questions, especially when it came to fixing bugs I was experiencing.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">nyyankster71</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Very Beautiful theme and great support team and fast response from author team.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">pranavkumbhare</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>
            </div>

            <div class="scroll-animation-wrapper no-overlay mt--50">
                <div class="scroll-animation scroll-right-left">

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Beautiful theme! (Of course, that’s why I got it). But most
                                        importantly, thank you for the quick responses from your customer support. I was
                                        finding it hard to install and customise the demo but he guided</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">teechelle</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The design Quality is perfect! Customer Support is the best so
                                        far.
                                        Thank you!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">3anbo3d</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The theme itself suits my needs, but the support is the superstar
                                        that earns this theme and the team behind it a 5 stars rating. Kudos!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">arikurnia1</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">A really great theme and a great design at a low price. <strong>All in all Excellent</strong>. Best. Best wishes for rainbow team.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">gorillacomputer1</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3"><strong>Great support,</strong> we have an issue with the theme and they solve it in the same day!! Thanks so much!!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">granviamarketing</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">This theme is beautiful, well crafted elements and the support is top notch! This team deserve everything! <strong>I recommend this 100%.</strong></p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">dasantos97</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">The theme is <strong>great and the support is even better</strong>. They helped my with installation and everything.
                                        Thank you!</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">hudecvfx</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">It is a very minimal beautiful theme. I really like these types of themes. <strong>They are also very good at support</strong>. They answered almost all my questions :)</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">mrtyildiz</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Just downloaded the theme. never used it yet but I'm sure that it's amazing because the HTML version was mind blowing so the WordPress is <strong>gonna be mind-blowing too :)</strong></p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">ranawebdesign</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>
            </div>

        </div>

        <div class="line-shape text-center">
            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/line-shape.png" alt="Shape">
        </div>
    </div>
    <!-- End Testimonial Area  -->

    <!-- Start Accordion Area  -->
    <div class="rbt-accordion-area accordion-style-1 rbt-accordion-color-white bg-color-darker rbt-section-gapBottom pt--60 pt_sm--0 overflow-hidden position-relative top-circle-shape-top overlpping-call-to-action">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-sm-12">

                    <div class="section-title text-center pb--60">
                        <div class="client-group-image">
                            <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/group-image.png" alt="group image" class="mb--30">
                        </div>
                        <span class="subtitle bg-secondary-opacity">Những câu hỏi thường gặp chúng tôi có thể giúp đỡ</span>
                        <h2 class="title mb_sm--0 text-center color-white-off">Bạn cần một câu hỏi khác ?</h2>
                    </div>
                    <div class="rbt-accordion-style rbt-accordion-02 accordion">
                        <div class="accordion" id="accordionExamplea1">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Hệ thống triki là gì ? Hoạt động thế nào?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Triki được tạo ra hướng tới Giáo dục, Trường học, Trung tâm khóa học, Cao đẳng, Học viện, Đại học, Trường học, Mẫu giáo, Trường học trực tuyến, Lms cổ điển, Tình trạng đại học, Danh mục giảng viên, Học viện ngôn ngữ, Huấn luyện thể dục, Khóa học trực tuyến, Khóa học đơn , Thị trường, Đại học cổ điển, Trang chủ thanh lịch, Công nghệ gia đình, v.v.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Làm cách nào tôi có thể nhận được sự hỗ trợ hệ thống?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Sau khi mua sản phẩm cần hỗ trợ gì bạn có thể chia sẻ với chúng tôi bằng cách tạo ticket hỗ trợ tại đây: <a target="_blank" href="https://lienketso.vn">Trung tâm hỗ trợ</a> nhóm hỗ trợ của chúng tôi sẽ sớm liên hệ với bạn
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Tôi có thể nhận được cập nhật thường xuyên không và tôi nhận được cập nhật trong bao lâu?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Có, bạn sẽ nhận được cập nhật từ Triki. Và bạn có thể lấy nó bất cứ lúc nào. Lần tới chúng tôi sẽ đi kèm với nhiều tính năng hơn. Bạn có thể nhận được cập nhật không giới hạn số lần. Nhóm chuyên dụng của chúng tôi làm việc để cập nhật.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Tôi có thể nâng cấp tài khoản bằng cách nào ?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Vâng, bạn có thể nâng cấp tài khoản lên tài khoản cao cấp để sử dụng dịch vụ tại Triki bằng cách click yêu cầu nâng cấp tài khoản tại trang quản lý profile của bạn
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Tôi có thể bán khóa học từ hệ thống bằng cách nào?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Để bán khóa học từ hệ thống, bạn sẽ cần tạo cho mình những khóa học chất lượng nhất, mở tài khoản cho người dùng sử dụng
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Hãy hướng dẫn tôi cách upload video bài học
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Vâng, để upload video bài học, bạn cần sử dụng các nền tảng video như youtube, vimeo. Sau khi upload video của bạn lên đó, lu trữ đường link và dán vào hệ thống triki
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        Tôi có thể xóa tài khoản không
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        <p>Bạn hoàn toàn có thể xóa tài khoản khỏi hệ thống hoặc tạm dừng tài khoản bất cứ lúc nào</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        Tôi muốn tăng số lượng thành viên ?
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                        Để tăng số lượng thành viên, hãy chia sẻ nhóm của bạn trên các nền tảng khác như facebook, tictok, zalo...
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Accordion Area  -->


@endsection
