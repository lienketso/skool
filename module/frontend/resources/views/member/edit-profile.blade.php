@extends('frontend::master')
@section('content')
    <section class="profile-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar-edit-profile">
                        <ul class="list-sidebar-profile">
                            <li><a href="{{route('frontend::member.profile.get')}}">Quay về trang chủ</a></li>
                            <li><a class="active" href="{{route('frontend::member.profile.get')}}">Profile</a></li>
                            <li><a href="{{route('frontend::member.change-password.get')}}">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-edit-profile">
                        <h4>Profile</h4>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <div class="form-edit-profile">
                            <div class="img-avatar-profile">
                                <span
                                    style="background-image: url('{{($userLogin->thumbnail!='') ? upload_url($userLogin->thumbnail) : asset('frontend/assets/images/avatar.png')}}')"></span>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="images" class="drop-container" id="dropcontainer">
                                        <span class="drop-title">Đổi ảnh đại diện</span>
                                        <input type="file" name="thumbnail" id="images" accept="image/*">
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-sk">
                                            <input type="text" class="form-profile" name="full_name" value="{{$userLogin->full_name}}" placeholder="Họ và tên *">
                                            @if ($errors->has('full_name'))
                                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-sk">
                                            <input type="text" class="form-profile" name="phone" value="{{$userLogin->phone}}" placeholder="Số điện thoại">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-profile" name="address" value="{{$userLogin->address}}" placeholder="Địa chỉ">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-profile" name="bio" rows="4" placeholder="Mô tả về bạn">{{$userLogin->bio}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="btn-update-profile">
                                                <button type="submit">Cập nhật profile</button>
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
