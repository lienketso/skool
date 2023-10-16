<?php

namespace Frontend\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Groups\Models\CatPercent;
use Groups\Repositories\GroupsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Product\Models\Product;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;


class ClassController extends BaseController
{
    protected $group;
    protected $catp;
    protected $product;
    public function __construct(
        GroupsRepository $groupsRepository,
        ProductRepository $productRepository,
        CatproductRepository $catproductRepository)
    {
        $this->group = $groupsRepository;
        $this->catp = $catproductRepository;
        $this->product = $productRepository;
    }

    public function getPostClassroom($id){
        $catProduct = $this->catp->find($id);
        $childsCat = $this->catp->findWhere(['parent'=>$catProduct->id])->all();
        $ids = [intval($id)];
        if($childsCat){
            foreach ($childsCat as $child){
                $ids[] += $child->id;
            }
        }
        $data = $catProduct->getGroup;
        $productFirst = $this->product->scopeQuery(function ($query) use ($ids,$catProduct){
            return $query->where('factory_id',$catProduct->group_id)->whereIn('cat_id',$ids);
        })->first();

        $markpercent = 0;
        $catPercent = CatPercent::where('user_id',\auth()->id())->where('cat_id',$id)
            ->where('group_id',$catProduct->group_id)->first();
        if($catPercent){
            $markpercent = $catPercent->mark_percent;
        }

        return view('frontend::group.create-posts',compact('catProduct','data','productFirst','markpercent'));
    }

    public function removeSet($id){
        $catProduct = $this->catp->find($id);
        $catProduct->delete($id);
        return redirect()->back();
    }

    public function createModule($id){
        $catProduct = $this->catp->find($id);
        $data = $catProduct->getGroup;
        return view('frontend::group.create-module',compact('data','catProduct'));
    }
    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Product::where("age", "=", $code)->first());
        return $code;
    }
    public function postCreateModule(Request $request, $id){
        $catProduct = $this->catp->find($id);
        $input = $request->except(['_token']);
        $input['cat_id'] = $id;
        $input['age'] = $this->generateUniqueCode();
        $input['factory_id'] = $catProduct->group_id;
        $input['chapter'] = $catProduct->parent;
        $input['user_post'] = auth()->id();
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'content' => 'required|min:5',
        ], [
            'name.required' => 'Bạn chưa nhập tên khóa học',
            'name.min' => 'Tiêu đề phải lớn hơn 2 ký tự',
            'content.required' => 'Nội dung bắt buộc nhập',
            'content.min' => 'Nội dung quá ngắn...',
        ]);
        try {
            $data = $this->product->create($input);
            return redirect()->route('frontend::create.post.get',$catProduct->parent);
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function editModule($id){
        $productInfor = $this->product->find($id);
        $catProduct = $this->catp->find($productInfor->cat_id);
        $data = $this->group->find($productInfor->factory_id);
        return view('frontend::group.edit-module',compact('productInfor','data','catProduct'));
    }
    public function postEditModule($id,Request $request){
        $input = $request->except(['_token']);
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'content' => 'required|min:5',
        ], [
            'name.required' => 'Bạn chưa nhập tên khóa học',
            'name.min' => 'Tiêu đề phải lớn hơn 2 ký tự',
            'content.required' => 'Nội dung bắt buộc nhập',
            'content.min' => 'Nội dung quá ngắn...',
        ]);
        try {
            $productInfor = $this->product->find($id);
            $catProduct = $this->catp->find($productInfor->cat_id);
            $data = $this->product->update($input,$id);
            return redirect()->route('frontend::create.post.get',$catProduct->parent);
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function removewModule($id){
        $catProduct = $this->product->find($id);
        $catProduct->delete($id);
        return redirect()->back();
    }

    //xóa khoóa học
    public function removeClass($id){
        $category = $this->catp->find($id);
        $childs = $this->catp->findWhere(['parent'=>$id])->all();
        //remove product
        if($childs){
            foreach($childs as $child){
                DB::table('product')->where('cat_id',$child->id)->delete();
            }
        }
        //remove cat parent
        DB::table('catproduct')->where('parent',$id)->delete();
        //remove cat child
        $this->catp->delete($id);
        return redirect()->back();

    }

}
