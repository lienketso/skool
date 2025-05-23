<div class="modal-write">
    <!-- Modal -->
    <div class="modal fade" id="EditModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
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
                            <input type="text" name="ename" placeholder="Tiêu đề" value="{{$p->name}}" class="txt-w-title input-w">
                            <span class="span_name"></span>
                        </div>
                        <div class="form-group frm-w-textarea">
                            <textarea name="econtent" rows="4" id="edit{{$p->id}}" placeholder="Hãy viết điều gì đó..."
                                                              class=" txt-w-title area-w">{!! $p->content !!}</textarea>
                            <span class="span_desc"></span>
                        </div>
                        <div class="form-group frm-w">
                            <div class="media-form-w" id="mediaFormW">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="file" id="upload-input-e" style="display: none" data-post="{{$p->id}}" >
                    <input type="hidden" name="address" value="" id="videoInsert">
                    <div class="left-w-footer">
                        <span data-toggle="tooltip" id="upload-button-e" data-placement="top" title="Thêm đính kèm"><i class="fa fa-paperclip"></i></span>
                        <span data-toggle="tooltip" data-placement="top" title="Chèn link"><i class="fa fa-link"></i></span>
                        <span data-toggle="tooltip" data-placement="top" title="Chèn video"><i class="fa fa-video"></i></span>
                    </div>
                    <div class="center-w-footer">
                        <input type="hidden" name="ecategory_{{$p->id}}" class="ecat_{{$p->id}}" value="{{$categories[0]->id}}">
                        <span id="catEditSelect" class="catPost" data-id="{{$p->id}}">{{($p->chuyenmuc()->exists()) ? $p->chuyenmuc->name : 'Chọn chuyên mục'}} <i class="fa fa-caret-down"></i></span>
                        <div class="chuyenmuc-group edit-chuyenmuc cm-{{$p->id}}">
                            <ul>
                                @foreach($categories as $cat)
                                    <li class="item-chuyenmuc-edit" data-name="{{$cat->name}}" data-id="{{$cat->id}}" data-post="{{$p->id}}">
                                        <p><strong>{{$cat->name}}</strong></p>
                                        <p>{{$cat->description}}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="right-w-footer">
                        <button type="button" class="btn-w-cancel" data-dismiss="modal">HỦY</button>
                        <button type="button" class="btn-w-post-edit" data-post="{{$p->id}}">POST</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
