<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'corp' => 'required',
            'title' => 'nullable',
            'name' => 'required',
            'postal' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address' => 'required',
            'tel' => 'required|regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'fax' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'mobile' => 'regex:/^[0-9]{3}-[0-9]{4}-[0-9]{3,4}$/',
            'mail' => 'email',
            'hp' => 'url',
        ];
    }

    public function messages(){
        return [
            'corp.required' => '会社名は必ず入力してください。',
            'name.required' => '名前は必ず入力してください。',
            'postal.required' => '郵便番号はは必ず入力してください。',
            'postal.regex' => '郵便番号はハイフンを入れて入力してください。',
            'address.required' => '住所は必ず入力してください。',
            'tel.required' => '電話番号は必ず入力してください。',
            'tel.regex' => '電話番号はハイフンを入れて入力してください。',
            'fax.regex' => 'FAX番号はハイフンを入れて入力してください。',
            'mobile.regex' => '携帯番号はハイフンを入れて入力してください。',
            'mail.email' => 'メールアドレスを入力してください。',
            'hp.url' => 'ホームページアドレスを入力してください。',
        ];
    }
}
