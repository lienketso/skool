<?php


namespace Faq\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FaqCreateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required|unique:product,name',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
        ];
    }

}
