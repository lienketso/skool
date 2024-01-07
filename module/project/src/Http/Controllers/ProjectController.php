<?php


namespace Project\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Post\Repositories\PostRepository;
use Project\Http\Requests\ProjectCreateRequest;
use Project\Http\Requests\ProjectEditRequest;
use Project\Repositories\BankRepository;

class ProjectController extends BaseController
{
    protected $model;
    protected $cat;
    protected $langcode;
    public function __construct(BankRepository $bankRepository)
    {
        $this->model = $bankRepository;
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
                return $e->orderBy('id','desc')
                    ->where('name','LIKE','%'.$name.'%');
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')->paginate(10);
        }

        return view('wadmin-project::index',['data'=>$data]);
    }
    public function getCreate(){
        return view('wadmin-project::create');
    }
    public function postCreate(ProjectCreateRequest $request){
        try{
            $input = $request->except(['_token','continue_post']);
            $data = $this->model->create($input);
            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::project.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::project.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-project::edit',['data'=>$data]);
    }

    function postEdit($id, ProjectEditRequest $request){
        try{
            $input = $request->except(['_token']);
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::project.index.get',['post_type'=>'project'])->with('edit','Bạn vừa cập nhật dữ liệu');
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
