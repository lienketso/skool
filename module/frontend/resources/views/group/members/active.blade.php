@extends('frontend::master')
@section('js-init')
    <script type="text/javascript">

        $('#changeBank').on('change',function (e){
            e.preventDefault();
            let _this = $(e.currentTarget);
            let bank_id = _this.val();
            let amount = _this.attr('data-amount');
            let infor = _this.attr('data-info');
            let url = _this.attr('data-url');

                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "json",
                    data: {bank_id},
                    success: function (result) {
                        console.log(result)
                        let showTrue = '<img src="https://img.vietqr.io/image/'+result.bank_id+'-'+result.account_no+'-'+result.template+'.png?amount='+amount+'&addInfo='+infor+'&accountName='+result.account_name+'">';
                        $('#showMe').html(showTrue);
                    },
                    error: function (data, status) {
                        $(".btn-w-post").html("Có lỗi xảy ra !");
                        console.log(data);
                    }
                });
        });
    </script>
@endsection
@section('content')
    <section class="profile-home">


                    <div class="content-active-group">
                        <div class="active-left-group">
                            <a class="logo-active" href="{{route('frontend::home')}}">
                                <img src="{{upload_url($setting['site_logo'])}}" alt="Triki việt nam">
                            </a>

                            <div class="box-list-icon-group">
                               {!! $setting['site_top_name_vn'] !!}
                            </div>
                        </div>
                        <div class="active-right-group">
                            <div class="form-active-group">
                                <h2>Nâng cấp tài khoản</h2>
                                <div class="content-g-right">
                                    {!! $setting['site_footer_info_1_vn'] !!}
                                </div>

                                <div class="list-qr-bank">

                                    <div class="option-bank-name">
                                        <select name="bank" id="changeBank" data-amount="{{$setting['update_amount_setting']}}" data-info="{{auth()->user()->code}}" data-url="{{route('ajax-get-bank-item')}}">
                                            <option value="{{$bankList[0]['bank_id']}}">--Chọn ngân hàng--</option>
                                            @foreach($bankList as $d)
                                            <option value="{{$d->bank_id}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="item-bank-qr-default" id="showMe">
                                        <img
                                            src="https://img.vietqr.io/image/{{$bankList[0]['bank_id']}}-{{$bankList[0]['account_no']}}-{{$bankList[0]['template']}}.png?amount={{$setting['update_amount_setting']}}&addInfo={{auth()->user()->code}}&accountName={{$bankList[0]['account_name']}}">
                                    </div>

                                </div>

                                <div class="box-payment-group">
                                    {!! $setting['site_description_vn'] !!}
                                    <p>Nội dung chuyển khoản : <strong>{{auth()->user()->code}}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>


    </section>
@endsection
