<?php


namespace Setting\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Setting\Models\Setting;
use Setting\Repositories\SettingRepositories;

class SettingController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(SettingRepositories $settingRepositories)
    {
        $this->model = $settingRepositories;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::index',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getFact(){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::fact',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getBox(){
        $setting = $this->model;
        return view('wadmin-setting::box',['setting'=>$setting]);
    }
    public function getKeyword(){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::keyword',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getWhy(){
        $setting = $this->model;
        return view('wadmin-setting::why',['setting'=>$setting]);
    }

    public function postBox(Request $request){
        $data = $request->except('_token');
        $data['home_box_icon_1'] = replace_thumbnail($data['home_box_icon_1']);
        $data['home_box_icon_2'] = replace_thumbnail($data['home_box_icon_2']);
        $data['home_box_icon_3'] = replace_thumbnail($data['home_box_icon_3']);
        $data['home_box_icon_4'] = replace_thumbnail($data['home_box_icon_4']);
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function saveSetting($data){
        foreach($data as $key=>$val){
            Setting::updateOrCreate(['setting_key'=>$key],['setting_value'=>$val]);
        }
    }

    public function postIndex(Request $request){
        $data = $request->except('_token');

//        if($request->hasFile('site_logo')){
//            $image = $request->site_logo;
//            $path = date('Y').'/'.date('m').'/'.date('d');
//            $data['site_logo'] = $path.'/'.$image->getClientOriginalName();
//            $image->move('upload/'.$path,$image->getClientOriginalName());
//        }
        $data['site_logo'] = replace_thumbnail($data['site_logo']);
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function postFact(Request $request){
        $data = $request->except(['_token']);
//        if($request->hasFile('fact_image')){
//            $image = $request->fact_image;
//            $path = date('Y').'/'.date('m').'/'.date('d');
//            $data['fact_image'] = $path.'/'.$image->getClientOriginalName();
//            $image->move('upload/'.$path,$image->getClientOriginalName());
//        }
//        $data['fact_image'] = replace_thumbnail($data['fact_image']);
        $data['fact_background'] = replace_thumbnail($data['fact_background']);

        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function postKeyword(Request $request){
        $data = $request->except('_token');
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function postWhy(Request  $request){
        $data = $request->except('_token');
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }


}
