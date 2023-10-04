@extends('frontend::master')
@section('content')
    <section class="d-flex flex-column bg-img-cover-center pt-xxl-13 pb-xxl-13 custom-height-sm" style="background-image: url('{{ ($data->banner!='') ? upload_url($data->banner) : asset('frontend/assets/images/bg-about-us-02.jpg')}}')">
        <div class="d-flex flex-column h-100 justify-content-center">
            <div class="container container-xxl">
                <h1 class="fs-30 mb-4">{{$data->name}}</h1>
                <p class="mb-0 mxw-435px" style="text-align: justify;">{{$data->description}}</p>
            </div>
        </div>
    </section>

    <section class="pt-11 pt-lg-15">
        <div class="container">
            <div class="">
               {!! $data->content !!}
            </div>
            @if($data->thumbnail!='')
            <img src="{{ ($data->thumbnail!='') ? upload_url($data->thumbnail) : asset('frontend/assets/images/no-image.png') }}" alt="Image" class="mb-10">
            @endif

        </div>
    </section>

    <section class="py-11 py-lg-15">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-3 mb-8 mb-lg-0">
                    <h2 class="fs-30 fs-md-40 lh-15 mb-6 pt-lg-5">{{($lang=='vn') ? 'Liên hệ' : 'Information'}}</h2>
                    <p class="font-weight-bold text-primary mb-4">{{($lang=='vn') ? 'Địa chỉ' : 'Address'}}</p>
                    <address class="mb-6">
                        {{$setting['site_address_'.$lang]}}
                    </address>
                    <p class="font-weight-bold text-primary mb-3">{{($lang=='vn') ? 'Hotline' : 'Hotline'}}</p>
                    <p class="mb-0">{{$setting['site_hotline_'.$lang]}}</p>
                    <p class="mb-7">{{$setting['site_email_vn']}}</p>
                    <a href="{{route('frontend::home.contact.get')}}" class="btn btn-primary">{{($lang=='vn') ? 'Liên hệ ngay' : 'Contact now'}}</a>
                </div>
                <div class="col-lg-9">
                    <div class="pl-lg-10">
                        <img src="{{asset('frontend/assets')}}/images/b-21.jpg" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
