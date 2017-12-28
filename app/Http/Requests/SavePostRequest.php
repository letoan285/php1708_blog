<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
            'title' => 'required',
            'slug' => 'required',
            'featured' => 'required|image|max:1999',
            'content' => 'required|min:6'
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Tên bài viết không để trống',
            'slug.required' => 'Tên đường dẫn không để trống',
            'featured.required' => 'Vui lòng chọn ảnh đại diện',
            'content.required' => 'Nội dung không để trống',
            'featured.image' => 'Ảnh không đúng định dạng',
            'featured.max' => 'Kích thước ảnh không quá 2 mê'
        ];
    }
}
