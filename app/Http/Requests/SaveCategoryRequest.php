<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|min:6|max:255',
            // 'slug' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Yêu cầu nhập tên danh mục',
            'name.min' => 'Nhập ít nhất 5 ký tự',
            'name.max' => 'Danh mục tối đa 255 ký tự',
            // 'slug.required' => 'Yêu cầu nhập đường dẫn',

        ];
    }
}
