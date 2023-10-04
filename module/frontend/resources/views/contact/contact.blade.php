@extends('frontend::master')
@section('js-init')

    <script type="text/javascript">
        $('.alert-content').hide();
        $('#successID').hide();
        $("#btnContact").on('click',function(e){
            e.preventDefault();
            let _this = $(e.currentTarget);
            let mess = '';
            let name = $('input[name="name"]').val();
            let phone = $('input[name="phone"]').val();
            let email = $('input[name="email"]').val();

            if( name.length<=1){
                mess += 'err';
                $('#sp_email').text('Bạn chưa nhập họ tên');
            }
            if (isNaN(phone) || phone.length<=1) {
                mess += 'err';
                $('input[name="phone"]').addClass('err_alert');
                $('#sp_phone').text('Số điện thoại có vẻ sai sai');
            }else{
                $('input[name="phone"]').removeClass('err_alert');
                $('#sp_phone').text('');
            }

            if(mess.length <=0 ){
                $('#txt_success').text('Your enquiry has been submitted successfully!');
                $('#successID').show(1000);
                $('.alert-content').hide();
                $('#frmContact').submit();
            }

        })
    </script>
@endsection

@section('content')

    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="{{route('frontend::home')}}">{{($lang=='vn') ? 'Trang chủ' : 'Home'}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{($lang=='vn') ? 'Liên hệ' : 'Contact'}}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="pt-10 pb-10" data-animated-id="2">
        <div class="container">
            <h2 class="fs-sm-40 mb-10 text-center">{{($lang=='vn') ? 'Liên hệ' : 'Contact Us'}}</h2>
        </div>
    </section>

    <div class="pb-14" data-animated-id="3">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-8 mb-8 mb-md-0">
                    <h2 class="fs-24 mb-2">
                        {{($lang=='vn') ? 'Chúng tôi rất mong nhận được hồi âm từ bạn.' : 'We would love to hear from you.'}}
                    </h2>
                    <p class="mb-7">{{($lang=='vn') ? 'Nếu bạn có những sản phẩm tuyệt vời do bạn tạo ra hoặc muốn hợp tác với chúng tôi, hãy gửi cho chúng tôi một thông điệp.' : 'If you’ve got great products your making or looking to work with us then drop us a line.'}}</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list_alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="successID">
                        <p id="txt_success"></p>
                    </div>
                    <form method="post" action="" id="frmContact">
                        {{csrf_field()}}
                        <div class="row mb-6">
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" placeholder="{{($lang=='vn') ? 'Họ và tên*' : 'Your Name*'}}" required="">
                                <p id="sp_email"></p>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" placeholder="{{($lang=='vn') ? 'Email' : 'Your Email(optional)'}}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" placeholder="{{($lang=='vn') ? 'Số điện thoại*' : 'Your Phone*'}}" required="">
                                <p id="sp_phone"></p>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="title" class="form-control" placeholder="{{($lang=='vn') ? 'Tiêu đề' : 'Title'}}">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <textarea class="form-control" name="messenger" rows="6">{{($lang=='vn') ? 'Thông điệp của bạn' : 'Comment'}}</textarea>
                        </div>

                        <button type="button" id="btnContact" class="btn btn-primary text-uppercase letter-spacing-05">{{($lang=='vn') ? 'Liên hệ ngay' : 'submit now'}}</button>
                    </form>
                </div>
                <div class="col-md-4 pl-xl-13 pl-md-6">
                    <p class="font-weight-bold text-primary mb-3">{{($lang=='vn') ? 'Địa chỉ' : 'Address'}}</p>
                    <address class="mb-6">
                        {{$setting['site_address_'.$lang]}}
                    </address>
                    <p class="font-weight-bold text-primary mb-2">{{($lang=='vn') ? 'Thông tin' : 'Information'}}</p>
                    <p class="mb-0">{{$setting['site_hotline_'.$lang]}} - {{$setting['site_hotline_2_'.$lang]}} </p>
                    <p class="mb-7">{{$setting['site_email_vn']}}</p>
                </div>
            </div>
        </div>
    </div>


@endsection
