<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductValidation extends FormRequest
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
        if($this->request->get('id') != null){
            return [

                'name' => 'between:5,255|unique:products,id,'.$this->request->get('id'),
                'price' => 'numeric|min:50000',
                'description' => 'min:10',
                'sort_description' => 'min:10',
                'image' => 'image',
                'images' => 'array',
                'images.*' => 'image'
    
            ];
        } else {
            return [

                'name' => 'unique:products|between:5,255',
                'price' => 'numeric|min:50000',
                'description' => 'min:10',
                'sort_description' => 'min:10',
                'image' => 'image',
                'images' => 'array',
                'images.*' => 'image'
            ];

        }
    }
    public function messages()
    {
        return [
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.between' => 'Tên sản phẩm nằm trong khảng từ 5 đến 255 kí tự',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm thấp nhất là 50000',
            'description' => 'Mô tả phải từ 10 kí tự trở lên',
            'sort_description' => 'Mô tả ngắn phải từ 10 kí tự trở lên',
            'image' => 'File ảnh phải có định dạng là:  jpeg, png, bmp, gif, svg, hoặc webp.',
            'images.* ' => 'File ảnh phải có định dạng là:  jpeg, png, bmp, gif, svg, hoặc webp.'
        ];
    }
}
