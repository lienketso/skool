<?php

namespace Frontend\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Groups\Models\CatPercent;
use Groups\Repositories\GroupsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Media\Repositories\MediaRepository;
use Post\Repositories\CommentsRepository;
use Post\Repositories\PostRepository;
use Illuminate\Support\Facades\File;
use Product\Models\Catproduct;
use Product\Models\ProductMark;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;
use Project\Repositories\BankRepository;
use Setting\Repositories\SettingRepositories;

class ApiController extends BaseController
{
    protected $post;
    protected $media;
    protected $cat;
    protected $group;
    protected $pro;
    protected $cm;
    protected $bank;
    protected $set;
    public function __construct(PostRepository $postRepository,
                                MediaRepository $mediaRepository,
                                CatproductRepository $catproductRepository,
                                GroupsRepository $groupsRepository,
                                ProductRepository $productRepository,
                                CommentsRepository $commentsRepository,
                                BankRepository $bankRepository,
                                SettingRepositories $settingRepositories
    )
    {
        $this->post = $postRepository;
        $this->media = $mediaRepository;
        $this->cat = $catproductRepository;
        $this->group = $groupsRepository;
        $this->pro = $productRepository;
        $this->cm = $commentsRepository;
        $this->bank = $bankRepository;
        $this->set = $settingRepositories;
    }

    public function apiPostGroup(Request $request){
        try{
            $input = $request->all();
            $data = $this->post->create($input);
            return response()->json($data);
        }catch (\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    public function apiEditPostGroup(Request $request){
        try{
            $input = $request->all();
            $postid = $request->post;
            $data = $this->post->update($input,$postid);
            return response()->json($data);
        }catch (\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    public function UploadFile(Request $request){
        $userAuth = Auth::user();
        $form_file = 'customFile';
        $file = $request->file($form_file);
        $new_name = time().'-'.$file->getClientOriginalName();
        $new_name = convert_vi_to_en(str_replace(' ','-',$new_name));
        $path = convert_vi_to_en(str_replace(' ','-',$userAuth->full_name));
        $upload_path = public_path() .'/upload/'.$path;
        // If path is not exist
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        //move upload file
        $file->move($upload_path,$new_name);
        //create media table
        $currentPost = $this->post->orderBy('created_at','desc')->first();
        $currentPostId = $currentPost->id+1;
        $data = [
            'table'=>'post',
            'table_id'=>$currentPostId,
            'name'=>$path.'/'.$new_name,
            'original_name'=>$file->getClientOriginalName(),
            'path_name'=>$upload_path
        ];
        $create = $this->media->create($data);
        return response()->json(upload_url($create->name));
    }

    public function apiCreateCategory(Request $request){
        $input = $request->all();
        $parentInfor = $this->cat->find($request->parent);
        $input['group_id'] = $parentInfor->group_id;
        $validatedData = $request->validate([
            'name' => 'required',
            'parent' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên mục',
            'parent.required' => 'Mục cha chưa khởi tạo',
        ]);
        try {
            $data = $this->cat->create($input);
            return response()->json($data);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function apiEditCategory(Request $request){
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên mục',
        ]);

        try {
            $update = [
              'name'=>$request->name
            ];
            $data = $this->cat->update($update,$id);
            return response()->json($data);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function apiEditCategoryParent(Request $request){
        $id = $request->id;
        $user = $request->users;
        $validatedData = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên mục',
        ]);
        try {
            $catInfor = $this->cat->find($id);
        $update = [
            'name'=>$request->name,
            'who'=>$request->who,
            'description'=>$request->description,
        ];
        $data = $this->cat->update($update,$id);
        if($user){
            $data->userPivot()->sync($user);
        }
        return response()->json($data);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function uploadEditFileCategory(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            try{
                $id = $request->id;
                $catInfor = $this->cat->find($id);
                $group = $this->group->find($catInfor->group_id);
                $path = convert_vi_to_en(str_replace(' ','-',$group->name));
                $image = $request->file('thumbnail');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));

                $update['thumbnail'] = $path.'/'.$newnname;

                $image->move('upload/'.$path,$newnname);
                $data = $this->cat->update($update,$id);
                $img_url = upload_url($data->thumbnail);
                // You can save the image path to the database or perform any other logic
                return response()->json($img_url);

            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }

        }

        return response()->json(['error' => 'Image upload failed']);
    }

    public function markAsRead(Request $request){
        $id = $request->id;
        try {
            $product = $this->pro->find($id);
            $product->freeship = 1;
            $product->save();

            $catProduct = $this->cat->find($product->cat_id);

            $countProduct = $this->pro->scopeQuery(function ($q) use ($product,$catProduct){
                return $q->where('factory_id',$product->factory_id)->where('chapter',$catProduct->parent);
            })->count();

            $updatePercent = (100/$countProduct);
            $user = \auth()->id();

            //update bảng product_mark sử dụng check đã đọc bài viết
            $marked = ProductMark::firstOrNew(['product_id'=>$id,'user_id'=>$user,'cat_id'=>$catProduct->parent]);
            $marked->save();
            //get cat name and create or update cat percent

            $countMarked = ProductMark::query()->where('cat_id',$catProduct->parent)->where('user_id',$user)->count();
            $countPercent = ($countMarked*$updatePercent);


            $firstOrCreate = CatPercent::firstOrNew(['cat_id'=>$catProduct->parent,'user_id'=>$user,'group_id'=>$product->factory_id]);
            $firstOrCreate->mark_percent = $countPercent;
            $firstOrCreate->save();

            return response()->json($product);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    //unread
    public function markAsUnread(Request $request)
    {
        $id = $request->id;
        try {
            $product = $this->pro->find($id);
            $product->freeship = 0;
            $product->save();

            $catProduct = $this->cat->find($product->cat_id);
            $user = auth()->id();

            // Xóa bản ghi đã đọc trong product_mark
            ProductMark::where([
                'product_id' => $id,
                'user_id' => $user,
                'cat_id' => $catProduct->parent
            ])->delete();

            // Đếm tổng số bài trong chương
            $countProduct = $this->pro->scopeQuery(function ($q) use ($product, $catProduct) {
                return $q->where('factory_id', $product->factory_id)
                    ->where('chapter', $catProduct->parent);
            })->count();

            // Đếm lại số bài đã đánh dấu
            $countMarked = ProductMark::where('cat_id', $catProduct->parent)
                ->where('user_id', $user)
                ->count();

            $updatePercent = ($countProduct > 0) ? (100 / $countProduct) : 0;
            $newPercent = $countMarked * $updatePercent;

            $catPercent = CatPercent::firstOrNew([
                'cat_id' => $catProduct->parent,
                'user_id' => $user,
                'group_id' => $product->factory_id
            ]);

            // Nếu còn bài đánh dấu thì cập nhật lại phần trăm
            if ($countMarked > 0) {
                $catPercent->mark_percent = $newPercent;
                $catPercent->save();
            } else {
                // Không còn bài đã đọc → xoá luôn dòng nếu muốn
                $catPercent->delete();
            }

            return response()->json(['status' => 'success', 'message' => 'Đã hủy đánh dấu bài đọc']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    //like post group
    public function likePost(Request $request){
        $id = $request->id;
        $user_id = $request->user_id;
        $user_like = $request->like;
        try {
            //Tang like bai viet
           $likeNow = DB::table('post')->where('id',$id)->increment('liked',1);
           $infor = $this->post->find($id);
           //user tang luot like
            $userLike = DB::table('users')->where('id',$user_id)->increment('liked',1);
            //dong bo user da like bai nay roi
            $infor->likesUser()->sync($user_like);
           return response()->json($infor);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }
    //comments post
    public function commentPost(Request $request){
        $comment = $request->comment;
        $user = $request->user;
        $post = $request->post;
        $validatedData = $request->validate([
            'comment' => 'required'
        ], [
            'comment.required' => 'Nội dung comment chưa nhập',
        ]);

        try{
            $input = [
                'post_id'=>$post,
                'user_id'=>$user,
                'content'=>$comment
            ];
            if(!is_null($request->parent)){
                $input['parent'] = $request->parent;
            }
            $data = $this->cm->create($input);
            $image = asset('frontend/assets/images/avatar.png');
            if($data->getUser->thumbnail!=''){
                $image = upload_url($data->getUser->thumbnail);
            }
            $respon = [
                'image'=>$image,
                'name'=>$data->getUser->full_name,
                'content'=>$data->content,
                'id'=>$data->id,
                'like_post'=>$data->liked
            ];

            return response()->json($respon);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function likeComment(Request $request){
        $id = $request->id;
        $user_id = $request->user;
        try {
            //Tang like bai comment
            $likeNow = DB::table('comments')->where('id',$id)->increment('liked',1);
            $infor = $this->cm->find($id);
            //user comment tang luot like
            $userLike = DB::table('users')->where('id',$infor->user_id)->increment('liked',1);
            //dong bo user da like bai nay roi
            $infor->likesComment()->sync($user_id);
            return response()->json($infor);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function getBankItem(Request $request){
        $bank_id = $request->bank_id;
        try {
            $userCode = auth()->user()->code;
            $settingAmount = $this->set->getSettingMeta('update_amount_setting');
            $bankInfor = $this->bank->findWhere(['bank_id'=>$bank_id])->first();
            $img = 'https://img.vietqr.io/image/'.$bankInfor->bank_id.'-'.$bankInfor->account_no.'-'.$bankInfor->template.'.png?amount='.$settingAmount.'&addInfo='.$userCode.'&accountName='.$bankInfor->account_name;
            $fullImg = '<img src="'.$img.'">';
            return response()->json($bankInfor);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function insertVideo(Request $request){

    }


}


