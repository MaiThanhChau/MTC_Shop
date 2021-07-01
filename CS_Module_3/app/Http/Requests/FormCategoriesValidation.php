<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\categories;

class FormCategoriesValidation extends FormRequest
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
        //kiểm tra xem nếu danh mục vừa thêm có thể loại gì
        //nếu tên danh mục có rồi nhưng khác tên thể loại thì vẫn có thể tạo mới
        $catParent_id = $this->request->get('catParent_id');
        $categories = categories::where('catParent_id', $catParent_id)->get();

        $namePost = $this->request->get('name');
        $array_name = [];
        foreach ($categories as $category) {
            $array_name[] = $category->name;
        }
        // array_search($namePost, $array_name);
        if($this->request->get('id') != null || !array_search($namePost, $array_name)){
            return [

                'name' => 'between:5,50|unique:categories,id,'.$this->request->get('id'),
    
            ];
        } else {
            return [

                'name' => 'unique:categories|between:5,50',
    
            ];

        }

    }

    public function messages()
    {
        return [

            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.between' => 'Tên danh mục phải từ 5 đến 50 kí tự',

        ];

    }
}
