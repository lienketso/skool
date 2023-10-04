@php
        $groupRoute = ['frontend::group.index.get'];
        $classRoute = ['frontend::group.classroom.get','frontend::create.post.get','frontend::create-module.get','frontend::group.classroom-detail.get'];
        $memberRoute = ['frontend::group.member.get'];
        $userMem = \Illuminate\Support\Facades\Auth::user();
        if($userMem){
            if($userMem->groups()->exists()){
                $listGroup = $userMem->groups;
            }
        }
@endphp
<div class="header-group">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="group-name">
                    <div class="img-group-name">
                        <a href="#"><img src="{{ ($data->thumbnail!='') ? upload_url($data->thumbnail) : asset('frontend/assets/images/icon-box-hotline.png')}}"></a>
                    </div>
                    <div class="group-title">
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                {{$data->name}}
                            </button>
                            <div class="dropdown-menu">
                                @if($userMem && $userMem->groups()->exists())
                                    <h5 class="dropdown-header">Đổi sang nhóm khác</h5>
                                    @if($listGroup)
                                        @foreach($listGroup as $d)
                                            <a class="dropdown-item {{($data->slug==$d->slug) ? 'g-active' : ''}}" href="{{route('frontend::group.index.get',$d->slug)}}">{{$d->name}}</a>
                                        @endforeach
                                    @endif
                                @endif
                                <a class="dropdown-item" href="{{route('frontend::group.create-room.get')}}"><i class="fa fa-plus"></i> Tạo nhóm mới</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-search-group">
                    <input type="text" class="input-search" placeholder="Tìm kiếm">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2">
                @if($userMem)
                <div class="notifi-group">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                        <span>0</span>
                    </a>
                    <a href="{{route('frontend::member.profile.get')}}" data-toggle="tooltip" title="Xem profile">
                        <i class="fa fa-user"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="menu-group">
                    <ul>
                        <li><a class="{{in_array(Route::currentRouteName(), $groupRoute) ? 'active' : '' }}" href="{{route('frontend::group.index.get',$data->slug)}}">Cộng đồng</a></li>
                        <li><a class="{{in_array(Route::currentRouteName(), $classRoute) ? 'active' : '' }}" href="{{route('frontend::group.classroom.get',$data->slug)}}">Classroom</a></li>
                        <li><a class="{{in_array(Route::currentRouteName(), $memberRoute) ? 'active' : '' }}" href="{{route('frontend::group.member.get',$data->slug)}}">Thành viên</a></li>
                        <li><a href="#">Bảng xếp hạng</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
