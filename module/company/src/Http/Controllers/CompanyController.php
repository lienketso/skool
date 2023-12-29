<?php


namespace Company\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Company\Http\Requests\CompanyCreateRequest;
use Company\Http\Requests\CompanyEditRequest;
use Company\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Product\Repositories\CatproductRepository;


class CompanyController extends BaseController
{
    protected $model;
    protected $cat;
    protected $langcode;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->model = $companyRepository;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        if($id){
            $data = $this->model->scopeQuery(function ($e) use($id){
                return $e->orderBy('id','desc')->where('id',$id);
            })->paginate(1);
        }elseif($name){
            $data = $this->model->scopeQuery(function($e) use ($name){
                return $e->orderBy('id','desc')->where('name','LIKE','%'.$name.'%')->where('lang_code',$this->langcode);
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')->where('lang_code',$this->langcode)->paginate(10);
        }

        return view('wadmin-company::index',['data'=>$data]);
    }
    public function getCreate(CatproductRepository $catproductRepository){
        $categoryList = $catproductRepository->orderBy('sort_order')
            ->findWhere(['lang_code'=>$this->langcode])->all();

        return view('wadmin-company::create',['categoryList'=>$categoryList]);
    }
    public function postCreate(CompanyCreateRequest $request){
        try{
            $input = $request->except(['_token','continue_post']);
            $input['thumbnail'] = replace_thumbnail($input['thumbnail']);
            $input['useradd'] = Auth::id();
            $input['slug'] = $request->name;
            $input['lang_code'] = $this->langcode;
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::company.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::company.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id, CatproductRepository $catproductRepository){
        $data = $this->model->find($id);
        return view('wadmin-company::edit',['data'=>$data]);
    }

    function postEdit($id, CompanyEditRequest $request){
        try{
            $input = $request->except(['_token']);
            $input['thumbnail'] = replace_thumbnail($input['thumbnail']);
            $input['slug'] = $request->name;
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::company.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    function remove($id){
        try{
            $this->model->delete($id);
            return redirect()->back()->with('delete','Bạn vừa xóa dữ liệu !');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    public function changeStatus($id){
        $input = [];
        $data = $this->model->find($id);
        if($data->status=='active'){
            $input['status'] = 'disable';
        }elseif ($data->status=='disable'){
            $input['status'] = 'active';
        }
        $this->model->update($input,$id);
        return redirect()->back();
    }

}
