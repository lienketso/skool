@extends('frontend::master')
@section('content')
    <div class="group-wrapper">
    @include('frontend::group.header')
        <div class="content-group">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="content-member-group">
                            <div class="header-member-group">
                                <div class="left-member">
                                    <a href="#" class="active">Thành viên {{$listMember->total()}}</a>
                                    <a href="#">Admin {{$countAdmin}}</a>
                                </div>
                                <div class="right-member"></div>
                            </div>
                            <div class="detail-list-member">
                                {{--member item--}}
                                @if($listMember)
                                    @foreach($listMember as $d)
                                    <div class="member-item">
                                        <div class="img-member-g">
                                            <a href="#">
                                                <img src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/avatar.png')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="infor-member-g">
                                            <p class="name-member-g">{{$d->full_name}}</p>
                                            <span class="username-member-g">{{ $d->username }}</span>
                                            <p class="bio-member">{{ $d->bio }}</p>
                                            <p class="member-online-g"><i class="fa fa-dot-circle"></i> Đang online</p>
                                            <p class="calender-member-g"><i class="fa fa-calendar"></i> Tham gia lúc {{format_date($d->created_at)}}</p>
{{--                                            <div class="add-member-admin">--}}
{{--                                                <button class="add-to-admin" type="button"><i class="fa fa-user"></i> Chọn làm admin</button>--}}
{{--                                                <button class="remove-admin" type="button"><i class="fa fa-ban"></i> Thôi làm admin</button>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="pagination-skool">
                                {{$listMember->withQueryString()->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="infor-group-member">
                            <div class="list-info-group">
                                <div class="banner-info-group">
                                    <img src="{{ ($data->banner!='') ? upload_url($data->banner) : asset('frontend/assets/images/banner-image.png')}}" alt="">
                                </div>

                                    @if($permissionType=='admin')
                                        <div class="btn-edit-group">
                                            <a href="{{route('frontend::group.edit-room.get',$data->slug)}}"><i class="fa fa-edit"></i> Sửa thông tin</a>
                                        </div>
                                    @endif

                                <div class="content-infor-group">
                                    <h4>{{$data->name}}</h4>
                                    <span><i class="fa fa-globe"></i> {{($data->group_type=='public') ? 'Public group' : 'Nhóm riêng tư'}}</span>
                                    <p>{{$data->bio}}</p>
                                    <div class="number-group-member">
                                        <div class="item-member-number">
                                            <p>{{thousand_format($data->users->count())}}</p>
                                            <div class="text-number-member">Thành viên</div>
                                        </div>
                                        <div class="item-member-number">
                                            <p>2</p>
                                            <div class="text-number-member">Online</div>
                                        </div>
                                        <div class="item-member-number">
                                            <p>1</p>
                                            <div class="text-number-member">Admin</div>
                                        </div>
                                    </div>

                                    <div class="icon-avatar-number">
                                        @if($popularMember)
                                            @foreach($popularMember as $d)
                                                <span style="background-image: url('{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/avatar.png')}}')"></span>
                                            @endforeach
                                        @endif
                                    </div>
                                    @if(auth()->check() && !$myMember->groups()->exists())
                                        <div class="btn-edit-group red-icon">
                                            <a href="{{route('frontend::group.join.get',$data->slug)}}"><i class="fa fa-heart"></i> Tham gia nhóm</a>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="list-info-group">
                                <div class="leaderboard-list">
                                    <h5>Bảng xếp hạng ( 30 ngày )</h5>

                                    @if($data->users()->exists())
                                        @foreach($data->users as $key => $d)
                                            <div class="item-leaderboard-number">
                                                <span class="number-leader leader-{{$key}}">{{$key+1}}</span>
                                                <span class="avatar-leader">
                                            <strong style="background-image: url('{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/avatar.png')}}')"></strong>
                                            {{$d->full_name}}
                                        </span>
                                                <span class="point-leader">+{{$d->liked}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="see-all-leader">
                                        <a href="#">Xem tất cả xếp hạng</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
