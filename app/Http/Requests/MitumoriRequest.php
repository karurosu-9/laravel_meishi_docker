<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitumoriRequest extends FormRequest
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
            'tekiyo1' => 'required',
            'tekiyo2' => 'nullable',
            'tekiyo3' => 'nullable',
            'tekiyo4' => 'nullable',
            'tekiyo5' => 'nullable',
            'tekiyo6' => 'nullable',
            'tekiyo7' => 'nullable',
            'tekiyo8' => 'nullable',
            'tekiyo9' => 'nullable',
            'tekiyo10' => 'nullable',
            'suryo1' => 'required',
            'suryo2' => 'nullable',
            'suryo3' => 'nullable',
            'suryo4' => 'nullable',
            'suryo5' => 'nullable',
            'suryo6' => 'nullable',
            'suryo7' => 'nullable',
            'suryo8' => 'nullable',
            'suryo9' => 'nullable',
            'suryo10' => 'nullable',
            'tanka1' => 'required',
            'tanka2' => 'nullable',
            'tanka3' => 'nullable',
            'tanka4' => 'nullable',
            'tanka5' => 'nullable',
            'tanka6' => 'nullable',
            'tanka7' => 'nullable',
            'tanka8' => 'nullable',
            'tanka9' => 'nullable',
            'tanka10' => 'nullable',
            'kingaku1' => 'required',
            'kingaku2' => 'nullable',
            'kingaku3' => 'nullable',
            'kingaku4' => 'nullable',
            'kingaku5' => 'nullable',
            'kingaku6' => 'nullable',
            'kingaku7' => 'nullable',
            'kingaku8' => 'nullable',
            'kingaku9' => 'nullable',
            'kingaku10' => 'nullable',
            'biko1' => 'nullable',
            'biko2' => 'nullable',
            'biko3' => 'nullable',
            'biko4' => 'nullable',
            'biko5' => 'nullable',
            'biko6' => 'nullable',
            'biko7' => 'nullable',
            'biko8' => 'nullable',
            'biko9' => 'nullable',
            'biko10' => 'nullable',
            'hosoku1' => 'nullable',
            'hosoku2' => 'nullable',
            'hosoku3' => 'nullable',
            'hosoku4' => 'nullable',
            'hosoku5' => 'nullable',
            'hosoku6' => 'nullable',
            'hosoku7' => 'nullable',
            'total_price' => 'required',
            'date' => 'required',
            'num' => 'required',
            'corp' => 'nullable',
            'kingaku1' => 'required',
            'suryo1' => 'required_with:tanka1',
            'kingaku2' => 'required_with:suryo1|required_with:tanka1',
            'suryo2' => 'required_with:tanka2',
            'kingaku2' => 'required_with:suryo2|required_with:tanka2',
            'suryo3' => 'required_with:tanka3',
            'kingaku3' => 'required_with:suryo3|required_with:tanka3',
            'suryo4' => 'required_with:tanka4',
            'kingaku4' => 'required_with:suryo4|required_with:tanka4',
            'suryo5' => 'required_with:tanka5',
            'kingaku5' => 'required_with:suryo5|required_with:tanka5',
            'suryo6' => 'required_with:tanka6',
            'kingaku6' => 'required_with:suryo6|required_with:tanka6',
            'suryo7' => 'required_with:tanka7',
            'kingaku7' => 'required_with:suryo7|required_with:tanka7',
            'suryo8' => 'required_with:tanka8',
            'kingaku8' => 'required_with:suryo8|required_with:tanka8',
            'suryo9' => 'required_with:tanka9',
            'kingaku9' => 'required_with:suryo9|required_with:tanka9',
            'suryo10' => 'required_with:tanka10',
            'kingaku10' => 'required_with:suryo10|required_with:tanka10',
        ];
    }

    public function messages()
    {
        return [
            'kingaku1.required' => '金額が入力がされていません。',
            'suryo1.required_with:tanka1' => '数量が記入されていません。',
            'required_with:suryo1|required_with:tanka1' => '金額が入力されていません。',
        ];
    }


}
