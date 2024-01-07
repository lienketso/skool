@extends('wadmin-dashboard::master')

@section('js')

@endsection
@section('js-init')

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::project.index.get',['post_type'=>'project'])}}">Thông tin</a></li>
        <li class="active">Sửa thông tin ngân hàng</li>
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
                        <h4 class="panel-title">Sửa thông tin</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để sửa ngân hàng mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Mã ngân hàng</label>
                            <select id="" name="bank_id" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option
                                    value="Techcombank"
                                    {{ ($data->bank_id =='Techcombank' ) ? 'selected' : ''}}>Techcombank</option>
                                <option value="BIDV" {{ ($data->bank_id  =='BIDV' ) ? 'selected' : ''}}>BIDV</option>
                                <option value="VietinBank" {{ ($data->bank_id  =='VietinBank' ) ? 'selected' : ''}}>VietinBank</option>
                                <option value="ACB" {{ ($data->bank_id =='ACB' ) ? 'selected' : ''}}>ACB</option>
                                <option value="VietcomBank" {{ ($data->bank_id =='VietcomBank' ) ? 'selected' : ''}}>VietcomBank</option>
                                <option value="VPBank" {{ ($data->bank_id =='VPBank' ) ? 'selected' : ''}}>VPBank</option>
                                <option value="Agribank" {{ ($data->bank_id  =='Agribank' ) ? 'selected' : ''}}>Agribank</option>
                                <option value="Sacombank" {{ ($data->bank_id  =='Sacombank' ) ? 'selected' : ''}}>Sacombank</option>
                                <option value="VIB" {{ ($data->bank_id =='VIB')  ? 'selected' : ''}}>VIB</option>
                                <option value="TPBank" {{ ($data->bank_id =='TPBank' ) ? 'selected' : ''}}>TP Bank</option>
                                <option value="MBBank" {{ ($data->bank_id =='MBBank' ) ? 'selected' : ''}}>MB Bank</option>
                                <option value="DongABank" {{ ($data->bank_id =='DongABank' ) ? 'selected' : ''}}>DongA Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input class="form-control"
                                   name="account_name"
                                   type="text"
                                   value="{{$data->account_name}}"
                                   placeholder="VD : NGUYEN THANH AN">
                        </div>
                        <div class="form-group">
                            <label>Tên ngân hàng</label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{$data->name}}"
                                   placeholder="VD : Ngân hàng Á Châu">
                        </div>


                        <div class="form-group">
                            <label>Số tài khoản</label>
                            <input class="form-control"
                                   name="account_no"
                                   type="text"
                                   value="{{$data->account_no}}"
                                   placeholder="VD: 19032866302014">
                        </div>
                        <div class="form-group">
                            <label>Kiểu hiển thị QR</label>
                            <select id="" name="template" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option
                                    value="print"
                                    {{ ($data->template =='print' ) ? 'selected' : ''}}>Bao gồm : Mã QR, các logo và đầy đủ thông tin chuyển khoản</option>
                                <option value="qr_only" {{ ($data->template =='qr_only' ) ? 'selected' : ''}}>Trả về ảnh QR đơn giản, chỉ bao gồm QR</option>
                                <option value="compact" {{ ($data->template =='compact' ) ? 'selected' : ''}}>QR kèm logo VietQR, Napas, ngân hàng</option>
                                <option value="compact2" {{ ($data->template =='compact2' ) ? 'selected' : ''}}>Bao gồm : Mã QR, các logo , thông tin chuyển khoản</option>
                            </select>
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
                            <label>Thứ tự hiển thị</label>
                            <input class="form-control"
                                   name="sort_order"
                                   type="number"
                                   value="{{$data->sort_order}}"
                                   placeholder="">
                        </div>

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
