<?php


namespace Product\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required',
            'cat_id'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tiêu đề',
            'cat_id.required'=>'Danh mục sản phẩm bắt buộc chọn'
        ];
    }
}
