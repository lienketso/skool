@extends('frontend::master')
@section('content')

<section class="login-page-skool">
    <div class="container">

        <div class="log-box">
            <form class="log-form" method="post" action="{{route('frontend::member.register.post')}}">
                {{csrf_field()}}
                <div class="logo-register">
                    <img src="{{upload_url($setting['site_logo'])}}" alt="Skool việt nam">
                    <h1>Tạo tài khoản của bạn</h1>
                </div>
                @if(Session::has('exception'))
                    <div class="alert alert-danger">
                        {{ Session::get('exception') }}
                        @php
                            Session::forget('exception');
                        @endphp
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="form-group form-sk">
                        <input type="text" name="full_name" value="{{old('full_name')}}" class="form-skool" placeholder="Họ và tên *">
                        @if ($errors->has('full_name'))
                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-sk">
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-skool" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-sk">
                        <input type="email" name="email" value="{{old('email')}}" class="form-skool" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-sk">
                        <input type="password" name="password" class="form-skool" placeholder="Mật khẩu">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group text-center mrg-top-15">
                        <button type="submit" class="btn btn-login-skool">Đăng ký</button>
                    </div>
                </div>
                <div class="bottom-form-login">
                    <p>Bằng cách đăng ký, bạn chấp nhận các điều khoản và chính sách bảo mật của chúng tôi.</p>
                    <p>Đã có tài khoản ? <a href="{{route('frontend::member.login.get')}}">Đăng nhập</a></p>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</section>
    @endsection
