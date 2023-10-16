@extends('frontend::master')

@section('js-init')
    <script type="text/javascript">
        $('#btnCreate').on('click',function (e){
           e.preventDefault();
           let name = $('input[name="name"]').val();
           let description = $('textarea[name="description"]').val();
           let mess = '';
           if(name.length<=0){
               mess += 'err';
               $('#errorName').show();
               $('#errorName').text('Vui lòng nhập tên khóa học');
           }else{
               $('#errorName').text('');
               $('#errorName').hide();
           }
           if(mess.length<=0){
               $('#frmClass').submit();
           }
        });
    </script>
@endsection

@section('content')

    @php
        $permissions = 'member';
        if(auth()->check()){
            $groupUser = \Groups\Models\GroupUser::where('user_id',auth()->id())->where('group_id',$data->id)->first();
            if($groupUser){
                $permissions = $groupUser->permission;
            }
        }
    @endphp

    <div class="group-wrapper">
    @include('frontend::group.header')

        <div class="content-group">
            <div class="container">
                <div class="row">
                    @foreach($listClass as $d)
                        @php
                            $age = '';
                            $percent = 0;
                            if($d->childs()->exists()){
                                $firstChild = $d->childs[0];
                                if($firstChild->product()->exists()){
                                    $firstProduct = $firstChild->product[0];
                                    $age = $firstProduct->age;
                                }
                            }
                            if(auth()->check()){
                                $inforPercent = \Groups\Models\CatPercent::where('cat_id',$d->id)->where('user_id',auth()->id())->first();
                                if(!is_null($inforPercent)){
                                     $percent = $inforPercent->mark_percent;
                                }else{
                                    $percent = 0;
                                }

                            }

                        @endphp
                    <div class="col-lg-4">
                        <div class="item-class">
                            @if ($permissions=='admin')
                            <div class="edit-remove-set">
                                <a data-toggle="tooltip" data-title="Sửa" href="{{route('frontend::create.post.get',$d->id)}}"><i class="fa fa-edit"></i></a>
                                <a data-toggle="tooltip" data-title="Xóa" href="{{route('frontend::remove-class-room.get',$d->id)}}"><i class="fa fa-times"></i></a>
                            </div>
                            @endif
                            <a href="{{route('frontend::group.classroom-detail.get',$d->id)}}?age={{$age}}">
                                <div class="item-class-img"
                                     style="background-image: url('{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}')"></div>
                                <div class="bao-desc-class">
                                    <div class="title-class">{{$d->name}}</div>
                                    <div class="desc-class">
                                        {{cut_string($d->description,80)}}
                                    </div>
                                    <div class="progress-class">

                                        <div class="progress">
                                            @if($percent==0)
                                            <div class="progress-bar not-percent" style="width:100%">0%</div>
                                            @else
                                                <div class="progress-bar" style="width:{{$percent}}%">{{ceil($percent)}}%</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="button-open-class">
                                        Mở ngay
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach



                        @if ($permissions=='admin')
                        <div class="col-lg-4">
                            <div class="add-new-class" title="Thêm khóa học mới" data-toggle="modal" data-target="#exampleModalCenter">
                                <span><i class="fa fa-plus-circle"></i> </span>
                            </div>
                        </div>
                        @endif


                    <div class="popup-create-cost">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                            <form method="post" id="frmClass" action="{{route('frontend::new.class.post')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="group_id" value="{{$data->id}}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm khóa học mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-add-cost">
                                            <div class="form-group frmerr">
                                                <input type="text" name="name" class="form-control" placeholder="Tên khóa học">
                                                <span id="errorName"></span>
                                            </div>
                                            <div class="form-group frmerr">
                                                <textarea rows="4" name="description" class="form-control" placeholder="Mô tả khóa học"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <select name="who" class="form-control">
                                                    <option value="1">Tất cả thành viên có thể xem</option>
                                                    <option value="2">Chỉ một số thành viên có thể xem</option>
                                                    <option value="3">Thành viên có thành tích cao</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="images" class="drop-container" id="dropcontainer">
                                                            <span class="drop-title">Đổi ảnh đại diện</span>
                                                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                                                        </label>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches" checked>
                                            <label class="custom-control-label" for="customSwitches">Xuất bản ngay</label>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="button" id="btnCreate" class="btn btn-primary">Thêm mới</button>
                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
