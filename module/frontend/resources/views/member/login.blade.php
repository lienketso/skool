@extends('frontend::master')
@section('content')

    <section class="login-page-skool">
        <div class="container">

            <div class="log-box">
                <form class="log-form" method="post">
                    <div class="logo-register">
                        <img src="{{upload_url($setting['site_logo'])}}" alt="Skool việt nam">
                        <h1>Đăng nhập</h1>
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
                        <div class="form-group">
                            <label><a href="#">Quên mật khẩu</a></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group text-center mrg-top-15">
                            <button type="submit" class="btn btn-login-skool">Đăng nhập</button>
                        </div>
                    </div>
                    <div class="bottom-form-login">
                        <p>Chưa có tài khoản ? <a href="{{route('frontend::member.register.get')}}">Đăng ký</a></p>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>
@endsection
