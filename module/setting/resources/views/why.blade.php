@extends('wadmin-dashboard::master')

@section('js')

@endsection
@section('js-init')

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::setting.index.get')}}">Cấu hình box thông tin trang chủ</a></li>
        <li class="active">Thông tin cấu hình</li>
    </ol>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thông tin cấu hình mục box thông tin tại trang chủ</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để cấu hình thông tin mong muốn</p>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding-bottom: 20px">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Heading title 1</label>
                                    <input class="form-control"
                                           name="home_why_heading_1"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_heading_1')}}"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Heading title 2</label>
                                    <input class="form-control"
                                           name="home_why_heading_2"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_heading_2')}}"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h3>Box 1</h3>
                                <div class="form-group">
                                    <label>Tiêu đề 1</label>
                                    <input class="form-control"
                                           name="home_why_title_1"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_title_1')}}"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề 2</label>
                                    <input class="form-control"
                                           name="home_why_desc_1"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_desc_1')}}"
                                           placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh đại diện </label>
                                    <div class="input-group col-xs-12" style="display: flex">
                                        <input type="text" name="home_why_img_1" value="{{$setting->getSettingMeta('home_why_img_1')}}"
                                               id="ckfinder-input-1" class="form-control file-upload-info" placeholder="Upload Image">
                                        <span class="input-group-append">
								    <button class="file-upload-browse btn btn-primary" id="ckfinder-popup-1"  type="button">Chọn ảnh</button>
							</span>
                                    </div>
                                    <div class="thumbnail_w" style="padding-top: 10px">
                                        <img src="{{ ($setting->getSettingMeta('home_why_img_1')!='null') ? upload_url($setting->getSettingMeta('home_why_img_1')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row" style="padding-bottom: 20px">
                            <div class="col-lg-12">
                                <h3>Box 2</h3>
                                <div class="form-group">
                                    <label>Tiêu đề 1</label>
                                    <input class="form-control"
                                           name="home_why_title_2"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_title_2')}}"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề 2</label>
                                    <input class="form-control"
                                           name="home_why_desc_2"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_desc_2')}}"
                                           placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh đại diện </label>
                                    <div class="input-group col-xs-12" style="display: flex">
                                        <input type="text" name="home_why_img_2" value="{{$setting->getSettingMeta('home_why_img_2')}}"
                                               id="ckfinder-input-2" class="form-control file-upload-info" placeholder="Upload Image">
                                        <span class="input-group-append">
								    <button class="file-upload-browse btn btn-primary" id="ckfinder-popup-2"  type="button">Chọn ảnh</button>
							</span>
                                    </div>
                                    <div class="thumbnail_w" style="padding-top: 10px">
                                        <img src="{{ ($setting->getSettingMeta('home_why_img_2')!='null') ? upload_url($setting->getSettingMeta('home_why_img_2')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row" style="padding-bottom: 20px">
                            <div class="col-lg-12">
                                <h3>Box 3</h3>
                                <div class="form-group">
                                    <label>Tiêu đề 1</label>
                                    <input class="form-control"
                                           name="home_why_title_3"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_title_3')}}"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề 2</label>
                                    <input class="form-control"
                                           name="home_why_desc_3"
                                           type="text"
                                           value="{{$setting->getSettingMeta('home_why_desc_2')}}"
                                           placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <div class="input-group col-xs-12" style="display: flex">
                                        <input type="text" name="home_why_img_3" value="{{$setting->getSettingMeta('home_why_img_3')}}"
                                               id="ckfinder-input-3" class="form-control file-upload-info" placeholder="Upload Image">
                                        <span class="input-group-append">
								    <button class="file-upload-browse btn btn-primary" id="ckfinder-popup-3"  type="button">Chọn ảnh</button>
							</span>
                                    </div>
                                    <div class="thumbnail_w" style="padding-top: 10px">
                                        <img src="{{ ($setting->getSettingMeta('home_why_img_3')!='null') ? upload_url($setting->getSettingMeta('home_why_img_3')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu lại</button>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tùy chọn thêm</h4>
                        <p>Thông tin các tùy chọn thêm </p>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection
