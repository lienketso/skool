<?php


namespace Faq\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Faq\Http\Requests\FaqCreateRequest;
use Faq\Http\Requests\FaqEditRequest;
use Faq\Models\Faq;
use Faq\Repositories\FaqRepository;
use Illuminate\Http\Request;



class FaqController extends BaseController
{
    protected $model;
    public function __construct(FaqRepository $faqRepository)
    {
        $this->model = $faqRepository;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $factory_id = $request->factory_id ;

        $q = Faq::query();
        if(!is_null($id)){
           $q = $q->where('id',$id);
        }
        if(!is_null($name)){
            $q = $q->where('name','LIKE','%'.$name.'%');
        }

        $data = $q->orderBy('created_at','desc')->paginate(10);

        return view('wadmin-faq::index',['data'=>$data]);
    }
    public function getCreate(){

        return view('wadmin-faq::create');
    }
    public function postCreate(FaqCreateRequest $request){
        try{
            $input = $request->except(['_token','continue_post']);
            $data = $this->model->create($input);

            //continue post if click continue
            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::faq.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::faq.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-faq::edit',['data'=>$data]);
    }

    function postEdit($id, FaqEditRequest $request){
        try{
            $input = $request->except(['_token']);
            $product = $this->model->update($input, $id);
            return redirect()->route('wadmin::faq.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
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
