@extends('frontend::master')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
@endsection
@section('js')
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        $('.done-read').on('click',function (e){
            e.preventDefault();
            let _this = $(e.currentTarget);
            let id = _this.attr('data-id');
            let url = _this.attr('data-url');
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {id},
                success: function (result) {
                    _this.removeClass('done-read');
                    _this.addClass('reader');
                    _this.attr('title','Đã đọc');
                    window.location.reload();
                },
                error: function (data, status) {
                    $("#done-read").html("Có lỗi xảy ra !");
                    console.log(data);
                }
            });

        });

        //unread
        $('.reader').on('click', function (e) {
            e.preventDefault();
            let _this = $(e.currentTarget);
            let id = _this.attr('data-id');
            let url = _this.attr('data-unread');

            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: { id },
                success: function (result) {
                    _this.removeClass('reader');
                    _this.addClass('done-read');
                    _this.attr('title', 'Chưa đọc');
                    window.location.reload();
                },
                error: function (data, status) {
                    console.log("Có lỗi xảy ra khi hủy đánh dấu đã đọc!", data);
                }
            });
        });

    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            const player = new Plyr('#player', {
                type: 'youtube',
                videoId: 'i4oAPEKcC9w',
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume'],
                iconUrl: null,
                tooltips: {
                    controls: false,
                    seek: false
                }
            });
        });


    </script>
@endsection

@section('content')
    <div class="group-wrapper">
        @include('frontend::group.header')

        <div class="content-group">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-detail">
                            <h1 class="title-class-page">{{$infor->name}}</h1>
                            <div class="progress-class">
                                <div class="progress">
                                    @if($markpercent==0)
                                        <div class="progress-bar not-percent" style="width:100%">0%</div>
                                    @else
                                        <div class="progress-bar" style="width:{{($markpercent==0) ? 0 : ceil($markpercent)}}%">{{ceil($markpercent)}}%</div>
                                    @endif
                                </div>
                            </div>

                            <div class="item-category-class">
                                <div class="accordion" id="accordionExample">
                                    @if($infor->childs()->exists())
                                        @foreach($infor->childs as $key=>$child)
                                        <div class="card">
                                            <div class="card-header" data-toggle="collapse" data-target="#collapse{{$child->id}}" aria-expanded="true">
                                                <span class="title">{{$child->name}} </span>
                                                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                            </div>
                                            <div id="collapse{{$child->id}}" class="collapse {{($child->id==$productI->cat_id) ? 'show' : ''}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    @if($child->product()->exists())
                                                    <ul class="list-child-category">
                                                        @foreach($child->product as $k=>$p)
                                                        <li><a href="?age={{$p->age}}" class="{{($p->age==request('age')) ? 'active' : ''}}">{{$k+=1}}. {{$p->name}}</a>
                                                            @if($marked && !is_null($marked))
                                                                <span class="done-read"><i class="fa fa-check-circle"></i></span>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="content-single-class">
                            @if(!$productI)
                                <h4>Chưa có bài học nào được tạo !</h4>
                            @else
                            <h2 class="title-single-class">
                               {{ ($productI) ? $productI->name : 'Null'}}
                                @if(in_array(auth()->id(),$arrUsersChecked) || $infor->who==1)
                                <span class="{{(!$marked && is_null($marked)) ? 'done-read' : 'reader'}}" data-id="{{($productI) ? $productI->id : 0}}"
                                      data-toggle="tooltip"
                                      title="{{(!$marked && is_null($marked)) ? 'Đánh dấu đã đọc' : 'Đã đọc'}}"
                                      data-url="{{route('ajax-mark-as-read-module')}}"
                                      data-unread="{{route('ajax-mark-as-unread-module')}}"
                                ><i class="fa fa-check-circle"></i></span>
                                @endif
                            </h2>

                            <div class="detail-class-post">
                                @if(in_array(auth()->id(),$arrUsersChecked) || $infor->who==1)
                                    @if(!is_null($productI->youtube) || !is_null($productI->vimeo))
                                    <div class="video-single-post">
    {{--                                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY"></div>--}}
                                        @if($productI->video_type=='youtube' && $productI->youtube!='')
                                            <iframe width="100%" height="400"
                                                    src="{!! parseVideos($productI->youtube) !!}?si=TNUHpReROl_eJVci&amp;controls=0"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                                    allowfullscreen></iframe>
                                        @endif
                                        @if($productI->video_type=='vimeo' && $productI->vimeo!='')
                                            <iframe src="{!! parseVideos($productI->vimeo) !!}"
                                                    width="100%" height="400" frameborder="0"
                                                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                                        @endif
                                    </div>
                                    @endif
                                {!! ($productI) ? $productI->content : 'Null' !!}
                                @else
                                    <div class="lock-single-page">
                                        <div class="item-lock-single-page">
                                            <div class="class-con-lock">
                                                <p><i class="fa fa-user-lock"></i></p>
                                                <h4>Bạn không có quyền xem bài học này</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
