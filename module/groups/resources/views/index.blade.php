@extends('wadmin-dashboard::master')
@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách các nhóm cộng đồng</a></li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title">Danh sách các nhóm cộng đồng</h4>
            <p>Danh sách các nhóm cộng đồng trên trang</p>
        </div>

        <div class="search_page">
            <div class="panel-body">
                <div class="row">
                    <form method="get">
                        <div class="col-sm-5">
                            <input type="text" name="name" placeholder="Nhập tiêu đề" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            <a href="{{route('wadmin::groups.index.get')}}" class="btn btn-default">Làm lại</a>
                        </div>
                        <div class="col-sm-5">
                            <div class="button_more">
{{--                                <a class="btn btn-primary" href="{{route('wadmin::groups.create.get')}}">Thêm mới</a>--}}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @if (session('edit'))
                    <div class="alert alert-info">{{session('edit')}}</div>
                @endif
                @if (session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
                @endif
                <table class="table nomargin">
                    <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên nhóm</th>
                        <th>Link</th>
                        <th class="">Hiện trang chủ ?</th>
                        <th class="">Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>
                                <div class="product-img bg-transparent border">
                                    <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
                            </td>
                            <td>{{$d->name}}</td>
                            <td><a href="{{route('frontend::group.index.get',$d->slug)}}" target="_blank">{{route('frontend::group.index.get',$d->slug)}}</a></td>
                            <td>
                                <a href="{{route('wadmin::groups.ishome.get',$d->id)}}"
                                   class="btn btn-success {{($d->is_home==1) ? 'btn-success' : 'btn-warning'}} radius-30">
                                    {{($d->is_home=='1') ? 'Hiện trang chủ' : 'Không'}}</a>
                            </td>
                            <td><a href="{{route('wadmin::groups.change.get',$d->id)}}"
                                   class="btn btn-sm {{($d->status=='active') ? 'btn-success' : 'btn-warning'}} radius-30">
                                    {{($d->status=='active') ? 'Đang hiển thị' : 'Tạm ẩn'}}</a></td>
                            <td>
                                <ul class="table-options">
                                    <li><a data-toggle="tooltips" data-title="Sửa nhóm" href="{{route('wadmin::groups.edit.get',$d->id)}}"><i class="fa fa-pencil"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$data->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>
@endsection
