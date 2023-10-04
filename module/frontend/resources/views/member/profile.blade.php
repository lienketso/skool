@extends('frontend::master')
@section('content')
    <section class="profile-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-profile">
                        <h5>Nhóm đã tham gia</h5>
                        <div class="list-membership">
                            @if($userLogin->groups()->exists())
                                @foreach($userLogin->groups as $d)
                            <div class="item-membership">
                                <a href="{{route('frontend::group.index.get',$d->slug)}}">
                                    <div class="ava-group-icon">
                                        <span class="ava-list-membership"
                                              style="background-image: url('{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/avatar.png')}}')"></span>
                                    </div>
                                    <div class="membership-name-list">
                                        <p>{{$d->name}}</p>
                                        <span>{{($d->group_type=='public') ? 'Công khai' : 'Riêng tư'}} • {{thousand_format($d->users->count())}} thành viên</span>
                                    </div>
                                </a>

                            </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="profile-right">
                        <div class="avatar-profile">
                            <span style="background-image: url('{{ ($userLogin->thumbnail) ? upload_url($userLogin->thumbnail) : asset('frontend/assets/images/icon-ava.jpg')}}')"></span>
                        </div>
                        <div class="name-profile">
                            <h5>{{$userLogin->full_name}}</h5>
                            <span>{{ $userLogin->email }}</span>
                            <div class="description-profile">
                                {{ $userLogin->bio }}
                            </div>
                        </div>
                        <div class="online-profile">
                            <p class="online-luon"><i class="fa fa-circle"></i> Đang online</p>
                            <p class="joined-page"><i class="fa fa-calendar"></i> Tham gia lúc {{get_day_created($userLogin->created_at)}} tháng {{get_month_created($userLogin->created_at)}}, {{get_year_created($userLogin->created_at)}}</p>
                        </div>

                        <div class="infor-member-profile">
                            <div class="item-member-profile">
                                <p>{{$userLogin->posts()->count()}}</p>
                                <span>Đóng góp</span>
                            </div>
                            <div class="item-member-profile">
                                <p>3</p>
                                <span>Người theo dõi</span>
                            </div>
                            <div class="item-member-profile">
                                <p>6</p>
                                <span>Đang theo dõi</span>
                            </div>
                        </div>

                        <div class="btn-edit-profile">
                            <a href="{{route('frontend::member.edit-profile.get')}}">Sửa profile</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
