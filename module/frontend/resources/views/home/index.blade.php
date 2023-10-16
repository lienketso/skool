@extends('frontend::master')

@section('js-init')
@endsection

@section('content')
    @include('frontend::header')
    <div class="home-page-wrapper">
        <div class="container">
            <div class="home-content-skool">
                <h1>Nền tảng cộng đồng dành cho người sáng tạo</h1>
                <p>Một phần cộng đồng, một phần trò chơi, một phần kinh doanh, một phần học tập. Kiếm sống mang mọi người lại với nhau để cộng tác trên các mục tiêu và sở thích chung. Kết bạn, hangout, kiếm tiền và vui chơi!</p>
                <div class="button-home-skool">
                    <a href="{{(\Illuminate\Support\Facades\Auth::user()) ? route('frontend::group.create-room.get') : route('frontend::member.register.get')}}"
                       class="first-button-home">Tạo cộng đồng của bạn</a>
                    <a href="#" class="second-button-home">Xem hướng dẫn</a>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="box-home-skool">
                            <img src="{{asset('frontend/assets/images/box-1.png')}}" alt="box thông tin">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box-home-skool">
                            <img src="{{asset('frontend/assets/images/box-2.png')}}" alt="box thông tin">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box-home-skool">
                            <img src="{{asset('frontend/assets/images/box-3.png')}}" alt="box thông tin">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box-home-skool">
                            <img src="{{asset('frontend/assets/images/box-4.png')}}" alt="box thông tin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
