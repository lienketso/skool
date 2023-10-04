@extends('frontend::master')
@section('content')
    <section class="succsess-cart" style="padding: 50px 0;">
        <div class="container">
            <div class="content-booked">
                <h1>Cảm ơn bạn đã đặt hàng !</h1>
                
                <div class="info-bank-checkout">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bank-me-info">
                                {!! $setting['fact_title_2_'.$lang] !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bank-info-cart">
                                <p>Tổng tiền : <span>{{number_format($data->amount)}} VND</span></p>
                                <p>Giảm giá chuyển khoản : <span class="mau">{{number_format($data->discount)}} VND</span></p>
                                <p>Vận chuyển : <span class="mau">{{$setting['fact_name_1_vn']}}</span></p>
                                <p style="padding-top: 10px; border-top: 1px solid #E37028">Thanh toán : <span class="">{{number_format($data->amount - $data->discount)}} VND</span></p>
                            </div>
                        </div>
                    </div>
                    <p style="padding-top: 30px">Nếu bạn đã thanh toán, xin bỏ qua thông báo trên nhé. Chúng tôi sẽ kiểm tra thông tin trong 24 giờ làm việc !</p>
                </div>
                <div class="back-home">
                    <a href="{{route('frontend::home')}}">Về trang chủ</a>
                </div>
            </div>
        </div>
    </section>
@endsection
