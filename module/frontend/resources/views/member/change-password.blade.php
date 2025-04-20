@extends('frontend::master')
@section('content')
    <section class="profile-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar-edit-profile">
                        <ul class="list-sidebar-profile">
                            <li><a  href="{{route('frontend::member.profile.get')}}">Về trang chủ</a></li>
                            <li><a  href="{{route('frontend::member.profile.get')}}">Profile</a></li>
                            <li><a class="active" href="{{route('frontend::member.change-password.get')}}">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-edit-profile">
                        <h4>Đổi mật khẩu</h4>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <div class="form-edit-profile">

                            <form method="post" action="" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-sk">
                                            <input type="password" class="form-profile" name="current_password" value="" placeholder="Mật khẩu cũ *">
                                            @if ($errors->has('current_password'))
                                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-sk">
                                            <input type="password" class="form-profile" name="new_password"  placeholder="Mật khẩu mới *">
                                            @if ($errors->has('new_password'))
                                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-profile" name="confirm_password" placeholder="Nhập lại mật khẩu mới *">
                                            @if ($errors->has('confirm_password'))
                                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="btn-update-profile">
                                                <button type="submit">Đổi mật khẩu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
