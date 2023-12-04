@extends('frontend::master')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/libs/confirm/jquery-confirm.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script src="{{asset('admin/libs/confirm/jquery-confirm.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        // auto close
        $('.example-p-6').on('click', function(e){
            e.preventDefault();
            let _this = $(e.currentTarget);
            let url = _this.attr('data-url');
            $.confirm({
                title: 'Xác nhận xóa',
                content: 'Bạn có chắc chắn muốn xóa dữ liệu không',
                autoClose: 'cancelAction|10000',
                escapeKey: 'cancelAction',
                buttons: {
                    confirm: {
                        btnClass: 'btn-red',
                        text: 'Xóa dữ liệu',
                        action: function(){
                            location.href = url;
                        }
                    },
                    cancelAction: {
                        text: 'Hủy',
                        action: function(){
                            $.alert('Đã hủy xóa dữ liệu !');
                        }
                    }
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

                        <!-- Modal edit parent -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa khóa học</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-add-cost">
                                            <div class="form-group frmerr">
                                                <input type="text" name="catname_{{$catProduct->id}}" value="{{$catProduct->name}}"  class="form-control catname_{{$catProduct->id}}" placeholder="Tên khóa học">
                                                <span id="errorName"></span>
                                            </div>
                                            <div class="form-group frmerr">
                                                <textarea rows="4" name="description" class="form-control" placeholder="Mô tả khóa học">{{$catProduct->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <select name="who" class="form-control">
                                                    <option value="1">Tất cả thành viên có thể xem</option>
                                                    <option value="2">Chỉ một số thành viên có thể xem</option>
                                                    <option value="3">Thành viên có thành tích cao</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="img-category-set">
                                                    <img src="{{ ($catProduct->thumbnail!='') ? upload_url($catProduct->thumbnail) : asset('frontend/assets/images/banner-image.png')}}">
                                                </div>
                                                <div class="form-group">

                                                    <label for="images" class="drop-container" id="dropcontainer">
                                                        <span class="drop-title">Đổi ảnh đại diện</span>
                                                        <input type="file" name="thumbnail"
                                                               id="thumbnail"
                                                               data-id="{{$catProduct->id}}"
                                                               data-url="{{route('ajax-edit-file-category-parent')}}" accept="image/*">
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches" checked>
                                            <label class="custom-control-label" for="customSwitches">Xuất bản ngay?</label>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="button" id="btnEditParent"
                                                data-url="{{route('ajax-edit-category-parent')}}"
                                                data-id="{{$catProduct->id}}"
                                                class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="left-create-post">
                            <h3 class="title-khoahoc">
                                <strong id="SetParentName">{{$catProduct->name}}</strong>
                                <span data-toggle="modal" data-target="#categoryModal"><i class="fa fa-ellipsis-h"></i></span>
                            </h3>
                            <div class="percent-khoahoc">
                                <div class="progress-class">
                                    <div class="progress">
                                        @if($markpercent==0)
                                            <div class="progress-bar not-percent" style="width:100%">0%</div>
                                        @else
                                            <div class="progress-bar" style="width:{{$markpercent}}%">{{ceil($markpercent)}}%</div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="add-new-set">
                                <button id="btnAddSet"><i class="fa fa-plus"></i> Thêm mục mới</button>
                            </div>

                            <div class="input-creat-set">
                                <input type="text" name="name" placeholder="Nhập tên mục *">
                                <span id="nameCreate"></span>
                                <button id="btnSaveSet" data-parent="{{$catProduct->id}}" data-url="{{route('ajax-create-category')}}">
                                    <i class="fa fa-check-circle"></i></button>
                            </div>

                            <div class="list-create-set" id="ListSet">
                                @if($catProduct->childs()->exists())
                                    @foreach($catProduct->childs as $child)
                                <div class="item-create-set">
                                    <p class="set-name"><strong id="name_{{$child->id}}">{{$child->name}}</strong>
                                        <span class="edit-set" data-toggle="modal" data-target="#exampleModal{{$child->id}}"><i class="fa fa-ellipsis-h"></i></span>
                                        <span class="remove-set example-p-6" data-url="{{route('frontend::set.remove.get',$child->id)}}"><i class="fa fa-times"></i></span>
                                    </p>
                                    <a href="{{route('frontend::create-module.get',$child->id)}}" class="add-more-module">+ Thêm module...</a>
                                    <div class="module-set-name">
                                        @if($child->product()->exists())
                                        <ul>
                                            @foreach($child->product as $key=>$p)
                                                <li class="{{($productFirst && $productFirst->id==$p->id) ? 'active' : ''}}">
                                                    <a href="{{route('frontennd::edit-module.get',$p->id)}}" data-toggle="tooltip" title="Click để sửa module">{{$key+1}}. {{$p->name}}</a>
                                                    <span class="remove-module example-p-6" data-url="{{route('frontennd::remove-module.get',$p->id)}}"><i class="fa fa-times"></i></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                            @endif
                                    </div>
                                </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$child->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{$child->id}}">Sửa tên mục</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-update-set">
                                                            <div class="form-group error-set">
                                                                <input type="text"
                                                                       name="uname_{{$child->id}}"
                                                                       value="{{$child->name}}"
                                                                       class="form-control uname_{{$child->id}}"
                                                                       placeholder="Tên mục *">
                                                                <span id="nameEdit"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                                        <button type="button" class="btn btn-primary btnEditSet" data-id="{{$child->id}}" data-url="{{route('ajax-edit-category')}}">Lưu lại</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="content-module-list">
                            @if($productFirst)
                                <h2 class="title-module-single">{{$productFirst->name}}</h2>
                                <div class="content-detail-module">

                                    <div class="video-single-post">
                                        @if($productFirst->video_type=='youtube')
                                        <iframe width="100%" height="400"
                                                src="{!! parseVideos($productFirst->youtube) !!}?si=TNUHpReROl_eJVci&amp;controls=0"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                                allowfullscreen></iframe>
                                            @else
                                            <iframe src="{!! parseVideos($productFirst->vimeo) !!}"
                                                    width="100%" height="400" frameborder="0"
                                                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                                        @endif
                                    </div>

                                    {!! $productFirst->content !!}
                                </div>
                            @else
                                <p>Chưa có bài học nào được tạo !</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
