<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        
        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1];  // The controller method
    
       
        switch ($method) {
            case 'create':
                return [
                    // 'image' => ['required'],
                    'name' => ['required'],
                    'text' => ['required'],
                ];
                break;
                
            case 'update':
                return [
                    // 'image' => ['required'],
                    'name' => ['required'],
                    'text' => ['required'],
                    'status' => ['required'],
                ];
                break;
         }
    }
    public function messages()
    {
        return [
            'image.required' => 'يجب تحميل الصورة ', 
            'name.required'=>'يجب كتابة اسم الدواء',
            'text.required'=>'يجب كتتابة تفاصيل الدواء',
            'status.required'=>'يجب تحديد حالة الطلب',
        ];
    }
}
