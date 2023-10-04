@extends('frontend::master')
@section('content')
    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="{{route('frontend::home')}}">{{($lang=='vn') ? 'Trang chủ' : 'Home'}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('frontend::blog.index.get',$catInfo->slug)}}"> {{$catInfo->name}} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pt-10 border-bottom" data-animated-id="2">
        <div class="container">
            <h1 class="mb-2 fs-40 text-center">
                {{$data->name}}
            </h1>
            <p class="mb-10 text-center">By <span class="text-primary"><strong>Admin</strong></span> on <span class="text-primary"><strong>{{$catInfo->name}}</strong></span>
            </p>

            <div class="row no-gutters">
                <div class="col-lg-9 mx-auto mb-7">
                    {!! $data->content !!}
                    <div class="row no-gutters">
                        @if(!is_null($data->tags))
                        <div class="col-sm-6 d-flex mb-4 mb-sm-0">
                            <label class="text-primary font-weight-bold mr-3 mb-0">Tag :</label>
                            <div class="d-flex">
                                {{$data->tags}}
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-6 d-flex justify-content-sm-end">
                            <label class="text-primary font-weight-bold mr-3 mb-0">Share:</label>
                            <ul class="list-inline d-flex align-items-center mb-0">
                                <li class="list-inline-item mr-4"><a target="_blank" href="http://pinterest.com/pin/create/button/?url={{route('frontend::blog.detail.get',$data->slug)}}&description={{$data->description}}&media={{upload_url($data->thumbnail)}}" class="fs-20 lh-1"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                                <li class="list-inline-item mr-4"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{route('frontend::blog.detail.get',$data->slug)}}" class="fs-20 lh-1"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item mr-4"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{route('frontend::blog.detail.get',$data->slug)}}&title={{$data->title}}&source={{route('frontend::blog.detail.get',$data->slug)}}" class="fs-20 lh-1"><i class="fab fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?text={{$data->description}}&url={{route('frontend::blog.detail.get',$data->slug)}}&via=TVRStore" class="fs-20 lh-1"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-7 pb-10 pb-md-15" data-animated-id="3">
        <div class="container">

            <h2 class="mb-10 fs-40 text-center">
                {{($lang=='vn') ? 'Có thể bạn quan tâm' : 'Related Articles'}}
            </h2>
            <div class="slick-slider" data-slick-options='{"slidesToShow": 3,"infinite":true,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 769,"settings": {"slidesToShow":2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                @foreach($related as $d)
                <div class="box">
                    <div class="card border-0">
                        <a href="{{route('frontend::blog.detail.get',$d->slug)}}" class="hover-shine card-img-top">
                            <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}" alt="{{$d->name}}">
                        </a>
                        <div class="card-body px-0 pt-6 pb-0">
                            <h3 class="card-title mb-0 fs-20">
                                <a href="{{route('frontend::blog.detail.get',$d->slug)}}">{{$d->name}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>

    @endsection
