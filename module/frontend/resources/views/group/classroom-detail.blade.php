@extends('frontend::master')

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
                                    <div class="progress-bar" style="width:{{($markpercent==0) ? 0 : ceil($markpercent)}}%">{{ ($markpercent==0) ? 0 : ceil($markpercent)}}%</div>
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
                                                        <li><a href="?age={{$p->age}}" class="{{($p->age==request('age')) ? 'active' : ''}}">{{$k+=1}}. {{$p->name}}</a></li>
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
                            <h2 class="title-single-class">
                               {{ ($productI) ? $productI->name : 'Null'}}
                                @if(auth()->check())
                                <span class="{{(!$marked && is_null($marked)) ? 'done-read' : 'reader'}}" data-id="{{($productI) ? $productI->id : 0}}"
                                      data-toggle="tooltip"
                                      title="{{(!$marked && is_null($marked)) ? 'Đánh dấu đã đọc' : 'Đã đọc'}}"
                                      data-url="{{route('ajax-mark-as-read-module')}}"
                                ><i class="fa fa-check-circle"></i></span>
                                @endif
                            </h2>
                            <div class="detail-class-post">
                                <div class="video-single-post">
                                    @if($productI->video_type=='youtube')
                                        <iframe width="100%" height="400"
                                                src="{!! parseVideos($productI->youtube) !!}?si=TNUHpReROl_eJVci&amp;controls=0"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                                allowfullscreen></iframe>
                                    @else
                                        <iframe src="{!! parseVideos($productI->vimeo) !!}"
                                                width="100%" height="400" frameborder="0"
                                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                                    @endif
                                </div>
                                {!! ($productI) ? $productI->content : 'Null' !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
