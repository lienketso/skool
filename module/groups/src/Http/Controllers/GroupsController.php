<?php

namespace Groups\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Groups\Models\Groups;
use Groups\Repositories\GroupsRepository;
use Illuminate\Http\Request;

class GroupsController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(GroupsRepository $groupsRepository)
    {
        $this->model = $groupsRepository;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $id = $request->get('id');
        $q = Groups::query();
        $data = $q->orderBy('created_at','desc')->paginate(20);
        return view('wadmin-groups::index',['data'=>$data]);
    }

    public function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-groups::edit',compact('data'));
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
    public function changeHome($id){
        $input = [];
        $data = $this->model->find($id);
        if($data->is_home=='0'){
            $input['is_home'] = '1';
        }elseif ($data->is_home=='1'){
            $input['is_home'] = '0';
        }
        $this->model->update($input,$id);
        return redirect()->back();
    }

}
