@extends('wadmin-dashboard::master')

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::gallery.index.get',['group'=>$data->group_id])}}">Sửa nhóm</a></li>
        <li class="active">Sửa nhóm cộng đồng</li>
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
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tên nhóm</label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{$data->name}}"
                                   placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn nhóm</label>
                            <input class="form-control"
                                   name="slug"
                                   type="text"
                                   value="{{$data->slug}}"
                                   placeholder="Đường dẫn cho nhóm">
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea id="" name="bio" class="form-control" rows="3" placeholder="Mô tả ngắn">{{$data->bio}}</textarea>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Lưu lại</button>
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
                            <label>Loại nhóm</label>
                            <select id="" name="group_type" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="private" {{ ($data->group_type=='private') ? 'selected' : ''}}>Nhóm riêng tư</option>
                                <option value="public" {{ ($data->group_type=='public') ? 'selected' : ''}}>Nhóm mở</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ ($data->status=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ ($data->status=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Upload ảnh</label>
                            <div class="input-group col-xs-12" style="display: flex">
                                <input type="text" name="thumbnail" value="{{$data->thumbnail}}" id="ckfinder-input-1" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="ckfinder-popup-1"  type="button">Chọn ảnh</button>
							</span>
                            </div>
                            <div class="col-xs-12">
                                <img src="{{($data->thumbnail!='') ? upload_url($data->thumbnail) : public_url('admin/themes/images/no-image.png')}}" id="imgreview" style="width: 100px; padding: 10px 0;">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection
