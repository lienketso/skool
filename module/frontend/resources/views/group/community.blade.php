@extends('frontend::master')
@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form',
            height: '300px',
            removePlugins: "exportpdf",
        });
        $(function(){
            $('.editor').each(function(e){
                CKEDITOR.replace( this.id, {
                    filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
                    filebrowserUploadMethod: 'form',
                    height: '300px',
                    removePlugins: "exportpdf",
                });
            });
        });
    </script>
<script type="text/javascript">
    $('#choosenCat').on('click',function(){
        $('.chuyenmuc-group').toggle();
    });
    $('.item-chuyenmuc').on('click',function (e){
       e.preventDefault();
       let _this = $(e.currentTarget);
       let name = _this.attr('data-name');
       let id = _this.attr('data-id');
       $('input[name="category"]').val(id);
       $('#choosenCat').html(name);
       $('.chuyenmuc-group').hide();
    });

    $('.catPost').on('click',function(e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let id = _this.attr('data-id');
        $('.cm-'+id).toggle();
    });
    $('.btn-w-post').on('click',function (){
        var editor = CKEDITOR.instances.editor1;
        let name = $('input[name="name"]').val();
        let content = editor.getData();
        let category = $('input[name="category"]').val();
        let user_post = $('input[name="user_post"]').val();
        let group_id = {{$data->id}};
        let url = "{{route('ajax.create.post-group.get')}}";
        let mess = '';
        if(name.length<=0){
            mess += 'err';
            $('.span_name').text('Vui lòng nhập tiêu đề');
        }else{
            mess = '';
            $('.span_name').text('')
        }
        //ajax post
        if(mess.length <=0 ) {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {name,content,category,user_post,group_id},
                success: function (result) {
                    console.log(result);
                    $('input[name="name"]').val('');
                    $('textarea[name="content"]').val('');
                    $('#writeModal').modal('hide');
                },
                error: function (data, status) {
                    $(".btn-w-post").html("Có lỗi xảy ra !");
                    console.log(data);
                }
            });
        }

    });
    //edit post
    //edit item chuyen muc
    $('.item-chuyenmuc-edit').on('click',function (e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let post = _this.attr('data-post');
        let name = _this.attr('data-name');
        let id = _this.attr('data-id');
        let editcat = $('.ecat_'+post);
        editcat.val(id);
        $('#catEditSelect').html(name);
        $('.edit-chuyenmuc').hide();
    });
    $('.btn-w-post-edit').on('click',function (e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let post = _this.attr('data-post');
        let postid ='edit'+post;
        var editor = CKEDITOR.instances[postid];
        let name = $('input[name="ename"]').val();
        let content = editor.getData();
        let editcat = $('.ecat_'+post);
        let category = editcat.val();
        let url = "{{route('ajax.edit.post-group.get')}}";
        let mess = '';
        if(name.length<=0){
            mess += 'err';
            $('.span_name').text('Vui lòng nhập tiêu đề');
        }else{
            mess = '';
            $('.span_name').text('')
        }
        //ajax post
        if(mess.length <=0 ) {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {post,name,content,category},
                success: function (result) {
                    console.log(result);
                    $('input[name="name"]').val('');
                    $('textarea[name="content"]').val('');
                    $('#EditModal'+post).modal('hide');
                    window.location.reload();
                },
                error: function (data, status) {
                    $(".btn-w-post").html("Có lỗi xảy ra !");
                    console.log(data);
                }
            });
        }

    });

    //upload file
    $( document ).ready(function() {
        $("#upload-button").on("click", function() {
            $("#upload-input").click();
        });

        $("#upload-input").on("change", function() {
            var file = this.files[0];
            let group_id = {{$data->id}};
            var form_data = new FormData();
            form_data.append("customFile", file);
            form_data.append("group_id", group_id);
            let url = "{{route('ajax.upload-media-file.post')}}";
            $.ajax({
                url:url, // router
                method:"POST",
                data: form_data,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    $('#mediaFormW').append('<div class="item-media-form" style="background-image: url('+data+')"></div>');
                }
            });
        });

        //likepost

        $('.clickLike').on('click',function (e){
           e.preventDefault();
           let _this = $(e.currentTarget);
           let url = _this.attr('data-url');
           let id = _this.attr('data-id');
           let user_id = _this.attr('data-user');
           let like = _this.attr('data-like');
           $.ajax({
               type: "POST",
               url: url,
               dataType: "json",
               data: {id,user_id,like},
               success: function (result) {
                   _this.removeClass('clickLike');
                   _this.addClass('active');
                   $('.like_'+id).text(result.liked);
               },
               error: function (data, status) {
                   console.log(data);
               }
           })
        });

    });

    //comment post
    $('.btnComment').on('click',function (e){
       e.preventDefault();
       let _this = $(e.currentTarget);
       let user = _this.attr('data-user');
       let post = _this.attr('data-post');
       let parent = _this.attr('data-parent');
       if(parent.length>0){
           post += '_child_'+parent;
       }

       let comment = $('.comment_'+post).val();

       let url = _this.attr('data-url');
       if(comment.length<=0){
           alert('Bạn chưa nhập nội dung');
           $('.comment_'+post).focus();
           return false;
       }

        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {user,post,comment,parent},
            success: function (result) {
                let html = '<div class="item-comment-post"><div class="img-comment-post avtar-icon "><a href=""><img src="'+result.image+'"></a></div><div class="comment-text-post"><div class="omg-post-infor"><p class="name-comment">'+result.name+'</p><p>'+result.content+'</p></div><div class="button-reply-cm"><button type="button"><i class="fa fa-thumbs-up"></i>'+result.like_post+'</button><span class="reply_cm" data-id="'+result.id+'">Trả lời</span> </div></div></div>';
                $('.list_com_'+post).append(html);
                $('.comment_'+post).val('');
               console.log(result);
            },
            error: function (data, status) {
                console.log(data);
            }
        })
    });

//
    $('.comment-child-post').hide();
    $('.reply_cm').on('click',function (e){
       e.preventDefault();
       let _this = $(e.currentTarget);
       let id = _this.attr('data-id');
       $('#frmcom_'+id).show(200);
    });
 //like comment
 $('.like_comment').on('click',function(e){
    e.preventDefault();
    let _this = $(e.currentTarget);
    let id = _this.attr('data-id');
    let user = _this.attr('data-user');
    let url = _this.attr('data-url');
    if(user.length>0){
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {id,user},
            success: function (result) {
                _this.removeClass('like_comment');
                _this.addClass('active');
                $('.like_com_'+id).text(result.liked);
            },
            error: function (data, status) {
                console.log(data);
            }
        })
    }
 });
</script>

@endsection

@section('content')
    <div class="group-wrapper">
        @include('frontend::group.header')

        <div class="content-group">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        @if(Session::has('perm'))
                            <div class="session-alert">
                                <div class="alert alert-danger">
                                    {{ Session::get('perm') }}
                                    @php
                                        Session::forget('perm');
                                    @endphp
                                </div>
                            </div>
                        @endif

                            @if(Session::has('success'))
                                <div class="session-alert">
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                </div>
                            @endif


                       @if($myMember && $myMember->groups()->exists())
                            <div class="write-somthing" data-toggle="modal" data-target="#writeModal">
                                <div class="input-write-something">
                                    <span class="icon-write MuiAvatar-root">
                                        <img src="{{ (\Illuminate\Support\Facades\Auth::user()->thumbnail!='') ? upload_url(\Illuminate\Support\Facades\Auth::user()->thumbnail) : asset('frontend/assets/images/avatar.png')}}"></span>
                                    <span class="title-write">Chia sẻ nội dung...</span>
                                </div>
                            </div>

                                <div class="modal-write">
                                    <!-- Modal -->
                                    <div class="modal fade" id="writeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                <span class="img-w-avatar">
                                                    <img src="{{ ($myMember->thumbnail!='') ? upload_url($myMember->thumbnail) : asset('frontend/assets/images/avatar.png')}}" alt="">
                                                </span>
                                                        <p><strong>{{$myMember->full_name}}</strong> đang viết bài tại <strong>{{$data->name}}</strong></p>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="content-w-modal">
                                                        <div class="form-group frm-w">
                                                            <input type="text" name="name" placeholder="Tiêu đề" class="txt-w-title input-w">
                                                            <span class="span_name"></span>
                                                        </div>
                                                        <div class="form-group frm-w-textarea">
                                                    <textarea name="content" rows="4" id="editor1" placeholder="Hãy viết điều gì đó..."
                                                              class="txt-w-title area-w"></textarea>
                                                            <span class="span_desc"></span>
                                                        </div>
                                                        <div class="form-group frm-w">
                                                            <div class="media-form-w" id="mediaFormW">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="file" id="upload-input" style="display: none">
                                                    <div class="left-w-footer">
                                                        <span data-toggle="tooltip" id="upload-button" data-placement="top" title="Thêm đính kèm"><i class="fa fa-paperclip"></i></span>
{{--                                                        <span data-toggle="tooltip" data-placement="top" title="Chèn link"><i class="fa fa-link"></i></span>--}}
{{--                                                        <span data-toggle="tooltip" data-placement="top" title="Chèn video"><i class="fa fa-video"></i></span>--}}
                                                    </div>
                                                    <div class="center-w-footer">
                                                        <input type="hidden" name="user_post" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                        <input type="hidden" name="category" value="{{$categories[0]->id}}">
                                                        <span id="choosenCat">Chọn chuyên mục <i class="fa fa-caret-down"></i></span>
                                                        <div class="chuyenmuc-group">
                                                            <ul>
                                                                @foreach($categories as $cat)
                                                                    <li class="item-chuyenmuc" data-name="{{$cat->name}}" data-id="{{$cat->id}}">
                                                                        <p><strong>{{$cat->name}}</strong></p>
                                                                        <p>{{$cat->description}}</p>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="right-w-footer">
                                                        <button type="button" class="btn-w-cancel" data-dismiss="modal">HỦY</button>
                                                        <button type="button" class="btn-w-post">POST</button>
                                                    </div>

                                                </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                           @else
                                <p>Tham gia nhóm để học tập và chia sẻ các thông tin hữu ích dành cho bạn <a href="{{route('frontend::group.join.get',$data->slug)}}">Tham gia</a></p>
                            @endif



                        <div class="category-group">
                            <span class="cat-write {{(is_null(request('cat')) ? 'active' : '')}}"><a href="{{route('frontend::group.index.get',$data->slug)}}">Tất cả</a></span>
                            @foreach($categories as $cat)
                                <span class="cat-write {{(request('cat')==$cat->id) ? 'active' : ''}}">
                                    <a href="{{route('frontend::group.index.get',$data->slug)}}?cat={{$cat->id}}">{{$cat->name}}</a>
                                </span>
                            @endforeach
                        </div>

                        <div class="list-write-content">
                            @foreach($postInGroup as $p)
                            {{--item write--}}
                            <div class="item-list-write">
                                @if(auth()->check() && $p->user_post==auth()->id())
                                <div class="edit-post-write">
                                    <a data-toggle="modal" data-target="#EditModal{{$p->id}}"><i class="fa fa-pencil-alt"></i></a>
                                    @include('frontend::group.popup.edit-write',$p)
                                </div>
                                @endif
                                <div class="header-item-write" data-toggle="modal" data-target="#DetailModal{{$p->id}}">
                                    <div class="avatar-write">
                                        <a href="#">
                                            <img src="{{ ($p->getUserPost->thumbnail!='') ? upload_url($p->getUserPost->thumbnail) : asset('frontend/assets/images/avatar.png')}}">
                                        </a>
                                    </div>
                                    <div class="heading-item-write">
                                        <h4>{{$p->getUserPost->full_name}}</h4>
                                        <p>{{$p->created_at->diffForHumans()}} tại <a href="#">{{$p->chuyenmuc->name}}</a></p>
                                    </div>


                                </div>

                                <div class="description-write-item" data-toggle="modal" data-target="#DetailModal{{$p->id}}">
                                    <div class="desc-item-left">
                                        <h3>{{$p->name}}</h3>
                                        <p>{!! cut_string($p->content,200) !!}</p>
                                    </div>
                                    @if($p->media()->exists())
                                        @php
                                            $postMedia = \Media\Models\Media::where('table_id',$p->id)->first();
                                        @endphp
                                    <div class="desc-item-right">
                                        <img src="{{upload_url($postMedia->name)}}" alt="thumbnail">
                                    </div>
                                        @endif
                                </div>

                                <div class="like-item-write">
                                    @if(auth()->check())
                                        @php
                                            $likeUser = \Groups\Models\LikeUsers::where('user_id',auth()->id())->where('post_id',$p->id)->first()
                                        @endphp
                                    <span class="{{($likeUser || !is_null($likeUser)) ? 'active' : 'clickLike'}}"
                                          data-id="{{$p->id}}"
                                          data-user="{{$p->user_post}}"
                                          data-like="{{auth()->id()}}"
                                          data-url="{{route('ajax-like-post-group')}}"><i class="fa fa-thumbs-up"></i> <em class="like_{{$p->id}}">{{$p->liked}}</em></span>
                                    <span><i class="fa fa-comment"></i> <em>{{$p->getComment()->count()}}</em></span>
                                    @else
                                        <span class=""><i class="fa fa-thumbs-up"></i> <em class="">{{$p->liked}}</em></span>
                                        <span><i class="fa fa-comment"></i> <em>{{$p->getComment()->count()}}</em></span>
                                    @endif
                                </div>
                            </div>

                                <div class="modal-detail-w">
                                    <div class="modal fade" id="DetailModal{{$p->id}}" tabindex="-1" aria-labelledby="ModalLabel{{$p->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="userpost-pop">
                                                        <div class="img-comment-post avtar-icon ">
                                                            <a href=""><img src="{{ ($p->getUserPost->thumbnail!='') ? upload_url($p->getUserPost->thumbnail) : asset('frontend/assets/images/avatar.png')}}"></a>
                                                        </div>
                                                        <div class="info-userpost-pop">
                                                            <p>{{$p->getUserPost->full_name}}</p>
                                                            <span>{{$p->created_at->diffForHumans()}} tại <b>{{$p->chuyenmuc->name}}</b></span>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="content-detail-post">
                                                        <h3 class="title-pop-post">{{$p->name}}</h3>
                                                        {!! $p->content !!}

                                                        @if($p->media()->exists())
                                                        <div class="media-detail-w">
                                                            <div class="list-media-detail-w">
                                                                @foreach($p->media as $m)
                                                                <div class="item-detail-media-w">
                                                                    <img src="{{upload_url($m->name)}}">
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="list-comment-post ">

                                                            <div class="list_com_{{$p->id}}">
                                                                @if($p->getComment()->exists())
                                                                    @foreach($p->getComment as $com)
                                                                        @php
                                                                            $likeComment = \Groups\Models\LikeComment::where('user_id',auth()->id())->where('comment_id',$com->id)->first()
                                                                        @endphp
                                                                        <div class="item-comment-post">
                                                                            <div class="img-comment-post avtar-icon ">
                                                                                <a href="">
                                                                                    <img src="{{ ($com->getUser->thumbnail!='') ? upload_url($com->getUser->thumbnail) : asset('frontend/assets/images/avatar.png')}}">
                                                                                </a>
                                                                            </div>
                                                                            <div class="comment-text-post">
                                                                                <div class="omg-post-infor">
                                                                                    <p class="name-comment">{{$com->getUser->full_name}}</p>
                                                                                    <p>{{$com->content}}</p>
                                                                                </div>

                                                                                <div class="button-reply-cm">
                                                                                    <button type="button" class="{{($likeComment || !is_null($likeComment)) ? 'active' : 'like_comment'}}"
                                                                                            data-user="{{(auth()->check()) ? auth()->id() : ''}}"
                                                                                            data-url="{{route('ajax-comment-like-group')}}"
                                                                                            data-id="{{$com->id}}"><i class="fa fa-thumbs-up"></i> <span class="like_com_{{$com->id}}">{{$com->liked}}</span></button>
                                                                                    <span class="reply_cm" data-id="{{$com->id}}">Trả lời</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="list_com_{{$p->id}}_child_{{$com->id}} child-comment">
                                                                        @if($com->childs()->exists())
                                                                                @foreach($com->childs as $child)
                                                                                <div class="item-comment-post ">
                                                                                    <div class="img-comment-post avtar-icon ">
                                                                                        <a href="">
                                                                                            <img src="{{ ($child->getUser->thumbnail!='') ? upload_url($child->getUser->thumbnail) : asset('frontend/assets/images/avatar.png')}}">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="comment-text-post">
                                                                                        <div class="omg-post-infor">
                                                                                            <p class="name-comment">{{$child->getUser->full_name}}</p>
                                                                                            <p>{{$child->content}}</p>
                                                                                        </div>

                                                                                        <div class="button-reply-cm">
                                                                                            <button type="button"><i class="fa fa-thumbs-up"></i></button>
                                                                                            <span>Trả lời</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                        @endif
                                                                        </div>

                                                                        @if(auth()->check())
                                                                        <div class="comment-child-post" id="frmcom_{{$com->id}}">
                                                                            <div class="comment-form-post">
                                                                                <div class="img-comment-post avtar-icon ">
                                                                                    <a href=""><img src="{{ ($myMember->thumbnail!='') ? upload_url($myMember->thumbnail) : asset('frontend/assets/images/avatar.png')}}"></a>
                                                                                </div>
                                                                                <div class="form-cm-post">
                                                                                    <input type="text" class="comment_{{$p->id}}_child_{{$com->id}}" name="comment_{{$p->id}}_child_{{$com->id}}" placeholder="Bình luận của bạn">
                                                                                    <button class="btnComment"
                                                                                            data-toggle="tooltip"
                                                                                            title="Gửi bình luận"
                                                                                            data-url="{{route('ajax-comment-post-group')}}"
                                                                                            data-post="{{$p->id}}"
                                                                                            data-parent="{{$com->id}}"
                                                                                            data-user="{{$myMember->id}}"><i class="fa fa-paper-plane"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                    @endforeach
                                                                @endif
                                                            </div>

                                                            @if(auth()->check())
                                                            <div class="comment-form-post">
                                                                <div class="img-comment-post avtar-icon ">
                                                                    <a href=""><img src="{{ ($myMember->thumbnail!='') ? upload_url($myMember->thumbnail) : asset('frontend/assets/images/avatar.png')}}"></a>
                                                                </div>
                                                                <div class="form-cm-post">
                                                                    <input type="text" class="comment_{{$p->id}}" name="comment_{{$p->id}}" placeholder="Bình luận của bạn">
                                                                    <button class="btnComment"
                                                                            data-toggle="tooltip"
                                                                            title="Gửi bình luận"
                                                                            data-url="{{route('ajax-comment-post-group')}}"
                                                                            data-post="{{$p->id}}"
                                                                            data-parent=""
                                                                            data-user="{{$myMember->id}}"><i class="fa fa-paper-plane"></i></button>
                                                                </div>
                                                            </div>
                                                            @endif

                                                        </div>

                                                        </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                            <div class="pagination-skool">
                                {{$postInGroup->withQueryString()->links()}}

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
                                    @if(auth()->check())
                                        @php
                                            $userGroup = \Groups\Models\GroupUser::where('user_id',$myMember->id)->where('group_id',$data->id)->first();
                                        @endphp
                                        @if(!is_null($userGroup))
                                            <div class="btn-edit-group red-icon"></div>
                                            @else
                                            <div class="btn-edit-group red-icon">
                                                <a href="{{route('frontend::group.join.get',$data->slug)}}"><i class="fa fa-heart"></i> Tham gia nhóm</a>
                                            </div>
                                        @endif
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
