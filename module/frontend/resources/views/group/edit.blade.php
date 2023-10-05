@extends('frontend::master')
@section('js-init')

@endsection
@section('content')
    <section class="profile-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar-edit-profile">
                        <ul class="list-sidebar-profile">
                            <li><a class="active" href="">Sửa thông tin nhóm</a></li>
                            <li><a href="{{route('frontend::member.profile.get')}}">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-edit-profile">
                        <h4>Sửa thông tin nhóm</h4>
                        @if(Session::has('exception'))
                            <div class="alert alert-danger">
                                {{ Session::get('exception') }}
                                @php
                                    Session::forget('exception');
                                @endphp
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="banner-edit-group">
                                        <img src="{{($data->banner!='') ? upload_url($data->banner) : asset('frontend/assets/images/banner-image.png')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="images" class="drop-container" id="dropcontainer">
                                            <span class="drop-title">Đổi ảnh nền</span>
                                            <input type="file" name="banner" id="banner" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="img-avatar-profile">
                                <span
                                    style="background-image: url('{{($data->thumbnail!='') ? upload_url($data->thumbnail) : asset('frontend/assets/images/avatar.png')}}')"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="images" class="drop-container" id="dropcontainerd">
                                            <span class="drop-title">Đổi ảnh đại diện</span>
                                            <input type="file" name="thumbnail" id="images" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-sk">
                                        <input type="text" class="form-profile" name="name" value="{{$data->name}}" placeholder="Tên nhóm *">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-sk">
                                        <input type="text" class="form-profile" name="slug" value="{{$data->slug}}" placeholder="Url nhóm ( VD : congdonghocthuat ) *">
                                        @if ($errors->has('slug'))
                                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="box-type-group">
                                            <label class="big">
                                                <input type="radio" name="group_type" value="private" {{($data->group_type=='private') ? 'checked' : ''}}>
                                                <i class="fa fa-lock"></i>
                                                <label>Nhóm riêng tư</label>
                                                <p>Chỉ thành viên mới có thể xem ai trong nhóm và nội dung họ đăng. Nội dung bị ẩn khỏi công cụ tìm kiếm.</p>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="box-type-group">
                                            <label class="big">
                                                <input type="radio" name="group_type" value="public" {{($data->group_type=='public') ? 'checked' : ''}}>
                                                <i class="fa fa-globe"></i>
                                                <label>Nhóm mở</label>
                                                <p>Bất kỳ ai cũng có thể xem ai trong nhóm và nội dung họ đăng. Nội dung có thể được thấy bởi các công cụ tìm kiếm.</p>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-profile" name="bio" rows="4" placeholder="Mô tả nhóm">{{$data->bio}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-update-profile">
                                            <button type="submit">Xác nhận sửa nhóm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
