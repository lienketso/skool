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

                                    <span class="subtitle">{{$setting['home_text_banner_1']}}</span>
                                </div>

                                <div class="banner-badge-top">
                                    <span class="subtitle">{{$setting['home_text_banner_2']}}</span>
                                </div>
                            </div>
                            <h1 class="title">{{$setting['home_heading_banner']}}
                                <span class="cd-headline slide">
                                    <span class="cd-words-wrapper">
                                        {!! $setting['fact_number_1_vn'] !!}
                                    </span>
                                </span>
                            </h1>
                            <div class="description-banner">
                               {!! $setting['fact_description_vn'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 order-1 order-xl-2">
                        <div class="video-popup-wrapper">
                            <img class="w-100 rbt-radius"
                                 src="{{ ($setting['fact_background']!='') ? upload_url($setting['fact_background']) : asset('frontend/histudy/assets/images')}}/splash/banner-group-image.png" alt="Video Images">
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
                                                <img src="{{ ($setting['home_box_icon_1']!='') ? upload_url($setting['home_box_icon_1']) : asset('frontend/histudy/assets/images')}}/icons/icons-01.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{$setting['home_box_title_1']}}</h4>
                                                <p>{{$setting['home_box_desc_1']}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{($setting['home_box_icon_2']!='') ? upload_url($setting['home_box_icon_2']) : asset('frontend/histudy/assets/images')}}/icons/icons-02.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{$setting['home_box_title_2']}}</h4>
                                                <p>{{$setting['home_box_desc_2']}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{ ($setting['home_box_icon_3']!='') ? upload_url($setting['home_box_icon_3']) : asset('frontend/histudy/assets/images')}}/icons/icons-03.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{$setting['home_box_title_3']}}</h4>
                                                <p>{{$setting['home_box_desc_3']}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12 service__style--column">
                                        <div class="service service__style--1">
                                            <div class="icon">
                                                <img src="{{ ($setting['home_box_icon_4']!='') ? upload_url($setting['home_box_icon_4']) : asset('frontend/histudy/assets/images')}}/icons/icons-04.png" alt="Icon Images">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{$setting['home_box_title_4']}}</h4>
                                                <p>{{$setting['home_box_desc_4']}}</p>
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
                            <span class="subtitle bg-secondary-opacity">{{$setting['home_why_heading_1']}}</span>
                            <h2 class="title">{{$setting['home_why_heading_2']}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-15">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">{{$setting['home_why_title_1']}}</span>
                                    <h4 class="title">{{$setting['home_why_desc_1']}}</h4>
                                </div>
                                <div class="thumbnail">
                                    <img src="{{ ($setting['home_why_img_1']!='') ? upload_url($setting['home_why_img_1']) : asset('frontend/histudy/assets/images/splash/topfeature/01.png')}}" alt="{{$setting['home_why_desc_1']}}">
                                </div>

                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/sun-shadow-right.png" alt="{{$setting['home_why_desc_1']}}">
                            </div>
                        </div>
                    </div>
                    <!-- End Top Feature  -->

                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-16">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">{{$setting['home_why_title_2']}}</span>
                                    <h4 class="title">{{$setting['home_why_desc_2']}}</h4>
                                </div>

                                <div class="thumbnail">
                                    <img src="{{ ($setting['home_why_img_2']!='') ? upload_url($setting['home_why_img_2']) : asset('frontend/histudy/assets/images/splash/topfeature/02.png')}}" alt="{{$setting['home_why_desc_2']}}">
                                </div>

                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images/splash/icons/sun-shadow-right-2.png')}}" alt="Shape Images">
                            </div>
                        </div>
                    </div>
                    <!-- End Top Feature  -->

                    <!-- Start Top Feature  -->
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <div class="top-features-box h-100 text-center bg-gradient-17">
                            <div class="inner">
                                <div class="content">
                                    <span class="pre-title text-uppercase">{{$setting['home_why_title_3']}}</span>
                                    <h4 class="title">{{$setting['home_why_desc_3']}}</h4>
                                </div>

                                <div class="thumbnail">
                                    <img src="{{ ($setting['home_why_img_3']!='') ? upload_url($setting['home_why_img_3']) : asset('frontend/histudy/assets/images/splash/topfeature/03.png')}}" alt="{{$setting['home_why_desc_3']}}">
                                </div>

                            </div>
                            <div class="shape-image">
                                <img src="{{asset('frontend/histudy/assets/images/splash/icons/sun-shadow-right-3.png')}}" alt="Shape Images">
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
                                <span class="btn-text">Tạo cộng đồng ngay</span>
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
                @foreach($listHotGroup as $key=>$d)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="170" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-splash-feature-box bg-gradient-11">
                        <a href="{{route('frontend::group.index.get',$d->slug)}}" target="_blank">
                            <div class="inner">
                                <div class="thumbnail">
                                    <img
                                        src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/histudy/assets/images/splash/feature/feature-08.png')}}"
                                         alt="{{$d->name}}">
                                </div>
                                <div class="content">
                                    <p class="description"><strong>{{$d->name}}</strong><br/>
                                        {{cut_string($d->bio,150)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
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
            @foreach($chunkComment as $key=>$chunks)
            <div class="scroll-animation-wrapper no-overlay {{($key==0 || $key==2) ? 'mt--50' : 'mt--30'}} ">
                <div class="scroll-animation {{($key==0 || $key==2) ? 'scroll-right-left' : 'scroll-left-right'}} ">

                    <!-- Start Single Testimonial  -->
                    @foreach($chunks as $chunk)
                    <div class="single-column-20 {{($key==0 || $key==2) ? 'bg-theme-gradient-odd' : 'bg-theme-gradient-even'}} ">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{asset('frontend/histudy/assets/images')}}/splash/icons/rating.png" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">{!! $chunk['description'] !!}</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ ($chunk['thumbnail']!='') ? upload_url($chunk['thumbnail']) : asset('frontend/histudy/assets/images')}}/splash/icons/envato.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">{{$chunk['name']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Testimonial  -->
                </div>
            </div>
            @endforeach

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

                            @foreach($faqList as $key=>$d)
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingOne{{$d->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$d->id}}"
                                            aria-expanded="true" aria-controls="collapseOne{{$d->id}}">
                                        {{$d->name}}
                                    </button>
                                </h2>
                                <div id="collapseOne{{$d->id}}" class="accordion-collapse collapse {{($key==0) ? 'show': ''}}"
                                     aria-labelledby="headingOne{{$d->id}}" data-bs-parent="#accordionExamplea1">
                                    <div class="accordion-body card-body">
                                      {!! $d->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Accordion Area  -->


@endsection
