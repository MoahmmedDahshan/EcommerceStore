<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingMethodsRequest extends FormRequest
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



    public function rules()
    {
        return [
            'id'=>'required|exists:settings',
            'value'=>'required',
            'plain_value'=>'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id.required'=>'معرف وسيلة التوصيل مطلوب',
            'value.required'=>'حقل :attribute مطلوب',
        ];
    }


    public function attributes()
    {
        return [
            'branches'=>'الفروع',
            'id'=>'المعرف',
            'value'=>'الاسم',
            'plain_value'=>'قيمة التوصيل',
        ];
    }
}

