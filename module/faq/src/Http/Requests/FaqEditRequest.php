<?php


namespace Faq\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FaqEditRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tiêu đề',
        ];
    }
}
