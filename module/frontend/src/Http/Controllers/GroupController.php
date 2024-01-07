<?php

namespace Frontend\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Category\Repositories\CategoryRepository;
use Groups\Models\CatPercent;
use Groups\Models\GroupUser;
use Groups\Repositories\GroupsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Post\Models\Post;
use Post\Repositories\PostRepository;
use Product\Models\ProductMark;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;
use Project\Models\Banks;
use Users\Models\Users;

class GroupController extends BaseController
{
    protected $group;
    protected $cat;
    protected $post;
    protected $catp;
    protected $po;
    public function __construct(GroupsRepository $groupsRepository,
                                CategoryRepository $categoryRepository,
                                PostRepository $postRepository,CatproductRepository $catproductRepository, ProductRepository $productRepository
    )
    {
        $this->group = $groupsRepository;
        $this->cat = $categoryRepository;
        $this->post = $postRepository;
        $this->catp = $catproductRepository;
        $this->po = $productRepository;
    }

    public function indexGroup($slug, Request $request){
        $data = $this->group->with(['users'=>function($query){
            return $query->orderBy('liked','desc')->limit(5);
        }])->findWhere(['slug'=>$slug])->first();

        if(!$data){
            return abort(404,'Not found');
        }
        $categories = $this->cat->orderBy('sort_order','asc')->findWhere(['status'=>'active'])->all();

        $q = Post::query();
        if(!is_null($request->cat)){
            $q->where('category',$request->cat);
        }
        $postInGroup = $q->with(['getComment'=>function($query){
            return $query->where('parent',null);
        }])->orderBy('created_at','desc')
            ->where('group_id',$data->id)->paginate(10);

        $popularMember = $data->users->take(5);
        $myMember = Auth::user();

        $permissionType = 'member';
        if(!is_null($myMember)){
            $userGroup = GroupUser::where('user_id',$myMember->id)->where('group_id',$data->id)->first();
            if(!is_null($userGroup) && $userGroup->permission!=''){
                $permissionType = $userGroup->permission;
            }

        }

        return view('frontend::group.community',compact(
            'data',
            'categories',
            'postInGroup',
            'popularMember',
            'myMember',
            'permissionType',
        ));
    }
    public function classroom($slug){
        $data = $this->group->findWhere(['slug'=>$slug])->first();
        if(!$data){
            return abort(404,'Not found');
        }
        $listClass = $this->catp->orderBy('created_at','asc')->scopeQuery(function ($e) use($data){
            return $e->where('parent',0)->where('group_id',$data->id);
        })->paginate(12);

        $listUserGroup = $data->users;

        return view('frontend::group.classroom',compact('data','listClass','listUserGroup'));
    }
    public function classroomDetail($id, Request $request){
        $infor = $this->catp->find($id);
        $data = $this->group->find($infor->group_id);
        $productI = [];
        if(!is_null($request->age)){
            $productI = $this->po->findWhere(['age'=>$request->age])->first();
        }
        $markpercent = 0;
        $catPercent = CatPercent::where('user_id',\auth()->id())->where('cat_id',$id)
            ->where('group_id',$infor->group_id)->first();

        if($catPercent){
            $markpercent = $catPercent->mark_percent;
        }
        //check đã đọc
        $marked = ProductMark::query()->where('product_id',$productI->id)->where('user_id',\auth()->id())->first();
        //lấy ra user đã được chấp thuận
        $arrUsersChecked = [];
        if($infor->userPivot()->exists()){
            $userChecked = $infor->userPivot;
            foreach($userChecked as $c){
                $arrUsersChecked[] = $c->id;
            }
        }

        return view('frontend::group.classroom-detail',compact('data','infor','productI','markpercent','marked','arrUsersChecked'));
    }

    public function createRoom(){
        $userLogin = \auth()->user();
        if ($userLogin->level=='basic'){
            return redirect()->route('frontend::group-active');
        }
        return view('frontend::group.create');
    }
    public function postCreateRoom(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'slug' => 'required|unique:groups|max:50'
        ], [
            'name.required' => 'Bạn chưa nhập tên cho nhóm',
            'slug.required' => 'Bạn chưa nhập url cho nhóm',
            'slug.unique' => 'Url đã có trong hệ thống, vui lòng chọn tên khác',
            'slug.max' => 'Url không quá 50 ký tự',
        ]);
        try{
            $user = Auth::user();
            $input['admin_id'] = $user->id;
            $input['slug'] = str_replace(' ','',$request->slug);
            $input['status'] = 'disable';
            $create = $this->group->create($input);
            $create->users()->sync([$user->id=>['permission'=>'admin']]);
            //cập nhật user tạo làm admin group
        }catch (\Exception $e){
            return redirect()->route('frontend::group.create-room.get')->with(['exception'=>$e->getMessage()]);
        }

        return redirect()->route('frontend::group.index.get',['slug'=>$create->slug]);
    }

    public function editRoom($slug){
        $data = $this->group->findWhere(['slug'=>$slug])->first();
        if(!$data){
            redirect();
        }
        return view('frontend::group.edit',compact('data'));
    }

    public function postEditRoom(Request $request,$slug){
        $data = $this->group->findWhere(['slug'=>$slug])->first();
        if(!$data){
            return false;
        }
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'slug' => 'required|unique:groups,slug,'.$data->id,
        ], [
            'name.required' => 'Vui lòng nhập tên nhóm',
            'slug.required' => 'Vui lòng nhập đường dẫn cho nhóm',
        ]);
        $path = convert_vi_to_en(str_replace(' ','-',$data->name));
        if($request->hasFile('thumbnail')){
            $image = $request->thumbnail;
            $newnname = time().'-'.$image->getClientOriginalName();
            $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
            $input['thumbnail'] = $path.'/'.$newnname;
            $image->move('upload/'.$path,$newnname);
        }
        if($request->hasFile('banner')){
            $image = $request->banner;
            $newnname_banner = time().'-'.$image->getClientOriginalName();
            $newnname_banner = convert_vi_to_en(str_replace(' ','-',$newnname_banner));
            $input['banner'] = $path.'/'.$newnname_banner;
            $image->move('upload/'.$path,$newnname_banner);
        }

        $data = $this->group->update($input,$data->id);
        return redirect()->back()->with(['success'=>'Cập nhật thông tin nhóm thành công']);

    }

    public function joinGroup($slug){
        $userInfo = Auth::user();
        $data = $this->group->findWhere(['slug'=>$slug])->first();
        if(!$data){
            return false;
        }
        $userInfo->groups()->sync($data->id);
        return redirect()->back()->with(['success'=>'Bạn đã trở thành thành viên nhóm tại '.$data->name]);
    }

    public function postClassroom(Request $request){
        $input = $request->except(['_token']);
        $validatedData = $request->validate([
            'name' => 'required|min:5',
        ], [
            'name.required' => 'Bạn chưa nhập tên khóa học',
        ]);
        $data = $this->group->find($request->group_id);
        $path = convert_vi_to_en(str_replace(' ','-',$data->name));
        if($request->hasFile('thumbnail')){
            $image = $request->thumbnail;
            $newnname = time().'-'.$image->getClientOriginalName();
            $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
            $input['thumbnail'] = $path.'/'.$newnname;
            $image->move('upload/'.$path,$newnname);
        }
        try {
            $create = $this->catp->create($input);
            if($request->who=='2' && !is_null($request->user_id)){
                $create->userPivot()->sync($request->user_id);
            }
            return redirect()->route('frontend::create.post.get',$create->id);
        }catch (\Exception $e){
            return redirect()->back()->with(['exception'=>$e->getMessage()]);
        }

    }

    //member group

    public function getMembers($slug,Request $request){
        $data = $this->group->with(['users'=>function($query){
            return $query->orderBy('liked','desc')->limit(5);
        }])->findWhere(['slug'=>$slug])->first();
        if(!$data){
            return abort(404,'Not found');
        }
        $popularMember = $data->users->take(5);
        $listMember = $data->users()->paginate(20);
        $myMember = Auth::user();
        $countAdmin = $data->users()->where(function ($e){
            return $e->where('permission','admin');
        })->count();

        $permissionType = 'member';
        if(!is_null($myMember)){
            $userGroup = GroupUser::where('user_id',$myMember->id)->where('group_id',$data->id)->first();
            if(!is_null($userGroup) && $userGroup->permission!=''){
                $permissionType = $userGroup->permission;
            }
        }

        return view('frontend::group.members.index',compact('data','popularMember','myMember','listMember','countAdmin','permissionType'));
    }


    public function activeGroup(){
        $bankList = Banks::query()->orderBy('sort_order','asc')->get();
        return view('frontend::group.members.active',compact('bankList'));
    }




}
