@extends('wadmin-dashboard::master')

@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder_v1.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}',
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::setting.index.get')}}">Cấu hình từ ngữ</a></li>
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
                        <h4 class="panel-title">Thông tin cấu hình từ ngữ trên trang web</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để cấu hình thông tin mong muốn</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group mb-3">
                            <label>Ảnh đại diện</label>
                            <div class="input-group col-xs-12" style="display: flex">
                                <input type="text" name="site_logo" value="{{$setting->getSettingMeta('fact_image')}}"
                                       id="ckfinder-input-2" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="ckfinder-popup-2"  type="button">Chọn ảnh</button>
							</span>
                            </div>
                            <div class="thumbnail_w" style="padding-top: 10px">
                                <img src="{{ ($setting->getSettingMeta('fact_image')!='null') ? upload_url($setting->getSettingMeta('fact_image')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề lĩnh vực 1</label>
                            <input class="form-control"
                                   name="keyword_1_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_1_'.$language)}}"
                                   placeholder="Tiêu đề mục lĩnh vực hoạt động 1 trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề lĩnh vực 2</label>
                            <input class="form-control"
                                   name="keyword_2_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_2_'.$language)}}"
                                   placeholder="Tiêu đề lĩnh vực lớn hơn trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề tin tức </label>
                            <input class="form-control"
                                   name="keyword_3_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_3_'.$language)}}"
                                   placeholder="Tiêu đề mục tin tức sự kiện trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề sản phẩm 1</label>
                            <input class="form-control"
                                   name="keyword_4_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_4_'.$language)}}"
                                   placeholder="Tiêu đề mục sản phẩm nổi bật 1 tại trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề sản phẩm 2</label>
                            <input class="form-control"
                                   name="keyword_5_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_5_'.$language)}}"
                                   placeholder="Tiêu đề mục sản phẩm nổi bật 2 tại trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề mục tuyển dụng trang chủ</label>
                            <input class="form-control"
                                   name="keyword_6_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_6_'.$language)}}"
                                   placeholder="Tiêu đề mục dự án nổi bật trang chủ">
                        </div>
                        <div class="form-group">
                            <label>Tiêu chân trang</label>
                            <input class="form-control"
                                   name="keyword_7_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_7_'.$language)}}"
                                   placeholder="Tiêu đề mục thông tin chân trang">
                        </div>
                        <div class="form-group">
                            <label>Mô tả nhà máy</label>
                            <input class="form-control"
                                   name="keyword_8_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('keyword_8_'.$language)}}"
                                   placeholder="Thông tin mô tả phần sản phẩm nhà máy">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
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
