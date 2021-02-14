<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'password'=>['required','min:8'],
            
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'يجب كتابة كلمة السر ', 
            'password.min' => 'يجب كتابة كلمة السر مكونة علي الاقل من 8 حروف', 
            'email.required'=>'يجب كتابة البريد الالكتروني',
            'name.required'=>'يجب كتابة الاسم',
            'phone.required'=>'يجب كتابة رقم الهاتف',
            'email.email'=>'البريد الالكتروني غير موجود'

        ];
    }
}
