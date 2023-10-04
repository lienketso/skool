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
                            <li><a class="active" href="">Tạo nhóm mới</a></li>
                            <li><a href="{{route('frontend::member.profile.get')}}">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-edit-profile">
                        <h4>Tạo nhóm</h4>
                        @if(Session::has('exception'))
                            <div class="alert alert-success">
                                {{ Session::get('exception') }}
                                @php
                                    Session::forget('exception');
                                @endphp
                            </div>
                        @endif
                        <form method="post">
                            {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-sk">
                                    <input type="text" class="form-profile" name="name" value="" placeholder="Tên nhóm *">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-sk">
                                    <input type="text" class="form-profile" name="slug" value="" placeholder="Url nhóm ( VD : congdonghocthuat ) *">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="box-type-group">
                                        <label class="big">
                                            <input type="radio" name="group_type" value="private">
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
                                            <input type="radio" name="group_type" value="public" checked>
                                            <i class="fa fa-globe"></i>
                                            <label>Nhóm mở</label>
                                            <p>Bất kỳ ai cũng có thể xem ai trong nhóm và nội dung họ đăng. Nội dung có thể được thấy bởi các công cụ tìm kiếm.</p>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-profile" name="bio" rows="4" placeholder="Mô tả nhóm">{{old('bio')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="btn-update-profile">
                                        <button type="submit">Xác nhận tạo nhóm</button>
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
