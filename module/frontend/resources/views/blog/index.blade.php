@extends('frontend::master')
@section('content')

<section class="py-3 bg-color-3" data-animated-id="1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-0">
                <li class="breadcrumb-item"><a href="{{route('frontend::home')}}">{{($lang=='vn') ? 'Trang chủ' : 'Home'}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="hot-blog-page">
    <div class="container">
       <h2 class="fs-sm-40 mb-8 text-center">{{$data->name}}</h2>
       <div class="list-hot-blog">
        <div class="row">
            @if(!empty($postNB) && count($postNB))
            @foreach($postNB as $d)
            <div class="col-lg-6">
                <div class="blog-noi-bat">
                    <a href="{{route('frontend::blog.detail.get',$d->slug)}}">
                        <img src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}" alt="{{$d->name}}"></a>
                    <h3><a href="{{route('frontend::blog.detail.get',$d->slug)}}">{{$d->name}}</a></h3>
                </div>
            </div>
            @endforeach
            @endif
            @if(!empty($postHot) && count($postHot))

            <div class="col-lg-6">
                <div class="list-hot-page">
                     @foreach($postHot as $d)
                    <div class="item-hot-page">
                        <div class="img-hot-page">
                            <a href="{{route('frontend::blog.detail.get',$d->slug)}}">
                                <img src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}" alt="{{$d->name}}">
                            </a>
                        </div>
                        <div class="title-hot-page">
                            <h3><a href="{{route('frontend::blog.detail.get',$d->slug)}}">{{$d->name}}</a></h3>
                        </div>
                    </div>
                    @endforeach
    
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</section>

<section class="pt-10 pb-11 pb-lg-15" data-animated-id="2">
    <div class="container">

        <div class="row">
             @foreach($post as $d)
            <div class="col-sm-6 col-lg-6 mb-8 fadeInUp animated" data-animate="fadeInUp">
                <div class="card border-0">
                    <a href="{{route('frontend::blog.detail.get',$d->slug)}}" class="hover-shine card-img-top">
                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}" alt="{{$d->name}}">
                    </a>
                    <div class="card-body px-0 pt-3 pb-0">

                        <h3 class="card-title mb-2 fs-20">
                            <a href="{{route('frontend::blog.detail.get',$d->slug)}}l">{{$d->name}}</a>
                        </h3>

                    </div>
                </div>
            </div>
             @endforeach

        </div>

     <nav>
        {{$post->links()}}
    </nav>
</div>
</section>

@endsection
