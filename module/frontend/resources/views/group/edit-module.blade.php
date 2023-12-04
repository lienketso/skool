@extends('frontend::master')
@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{asset("admin/libs/ckfinder/ckfinder.html")}}',
            filebrowserImageBrowseUrl: '{{asset("admin/libs/ckfinder/ckfinder.html?type=Images")}}',
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form',
            height: '500px',
        });
    </script>
    <script type="text/javascript">
            // $('.show-input-youtube').hide();
            // $('.show-input-vimeo').hide();
            $('.videoType').on('change',function (e){
                if(this.value==='youtube'){
                    $('.show-input-youtube').show();
                    $('.show-input-vimeo').hide();
                }else{
                    $('.show-input-youtube').hide();
                    $('.show-input-vimeo').show();
                }
            });
            let type = $('.videoType option:selected').val();
            if(type==='youtube'){
                $('.show-input-youtube').show();
                $('.show-input-vimeo').hide();
            }else if(type==='vimeo'){
                $('.show-input-youtube').hide();
                $('.show-input-vimeo').show();
            }
    </script>
@endsection

@section('content')
    <div class="group-wrapper">
        @include('frontend::group.header')
        <div class="content-group">
            <div class="container">
                <div class="breadcrumb-class">
                    <a href="{{route('frontend::create.post.get',$catProduct->parent)}}"><i class="fa fa-undo"></i> Quay lại </a>
                    <span>Sửa bài học mới</span>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="title-khoahoc">
                            <strong id="SetParentName">Module : {{$catProduct->name}}</strong>
                        </h3>
                        <div class="content-create-module">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <span>{{ $error }} <i class="fa fa-exclamation-circle"></i></span>
                                    </div>
                                @endforeach
                            @endif
                            <form method="post" action="" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group frm-create">
                                    <label>Tiêu đề <span>*</span></label>
                                    <input type="text" name="name" value="{{$productInfor->name}}" class="form-control" placeholder="Nhập tiêu đề của bài học">
                                </div>
                                <div class="form-group frm-create">
                                    <label>Video bài học</label>
                                    <div class="add-video-option">
                                        <select name="video_type" class="form-control videoType">
                                            <option value="">-Chọn loại video-</option>
                                            <option value="youtube" {{($productInfor->video_type=='youtube') ? 'selected' : ''}}>Youtube</option>
                                            <option value="vimeo" {{($productInfor->video_type=='vimeo') ? 'selected' : ''}}>Vimeo</option>
                                        </select>
                                    </div>
                                    <div class="show-input-youtube">
                                        <input type="text" name="youtube" value="{{$productInfor->youtube}}" placeholder="Link video youtube" class="form-control">
                                    </div>
                                    <div class="show-input-vimeo">
                                        <input type="text" name="vimeo" value="{{$productInfor->vimeo}}" placeholder="Link video Vimeo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group frm-create">
                                    <label>Nội dung <span>*</span></label>
                                    <textarea class="form-control" name="content" id="editor1" cols="30" rows="10" placeholder="Nội dung *">{!! $productInfor->content !!}</textarea>
                                </div>
                                <div class="form-group frm-create text-right">
                                    <button type="reset"><i class="fa fa-registered"></i> Làm lại</button>
                                    <button type="submit"><i class="fa fa-save"></i> Lưu lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
