@extends('frontend::master')
@section('content')
    <section class="profile-home">


                    <div class="content-active-group">
                        <div class="active-left-group">
                            <a href="{{route('frontend::home')}}"><img src="{{upload_url($setting['site_logo'])}}" alt="Triki việt nam"></a>

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

                                <div class="box-payment-group">
                                    {!! $setting['site_description_vn'] !!}
                                    <p>Nội dung chuyển khoản : <strong>{{auth()->user()->code}}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>


    </section>
@endsection
