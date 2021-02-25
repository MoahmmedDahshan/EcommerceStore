<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $admin = auth('admin')->user();
        return [
            'name' => 'required',
//            update email without unique email if update to same admin
            'email' => 'required|email|unique:admins,email,' . auth('admin')->user()->id,
//            check old password filed is match old password
            'current_password' => ['required_with:password','nullable', function ($attribute, $value, $fail) use ($admin) {
                if (!\Hash::check($value, $admin->password)) {
                    return $fail('كلمة المرور الحالية غير صحيحة');
                }
            }],
//            check password is same confirm password
            'password' => 'required_with:current_password|nullable|string|min:6|confirmed',
            'password_confirmation' => 'required_with:current_password|nullable',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'حقل :attribute مطلوب',
            'required_with' => 'حقل :attribute مطلوب',
//            'required_if' => 'حقل :attribute مطلوب',
            'email.email' => 'يبجب أن يكون تنسيق بريد إلكتروني',
            'email.unique' => 'البريد الإلكرتوني مستخدم بالفعل',
            'string' => 'يجب أن يكون حقل :attribute تنيسق نصي',
            'min' => 'يجب أن يكون حقل :attribute على الاقل 6 أحرف',
            'confirmed' => 'كلمات المرور غير متطابقة',
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'الأسم',
            'email' => 'البريد الإلكتروني',
            'current_password' => 'كلمة المرور الحالية',
            'password' => 'كلمة المرور الجديدة',
            'password_confirmation' => 'تأكيد كلمة المرور الجديدة',
        ];
    }
}
