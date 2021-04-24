<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_ar'=>'required|max:20',
            'name_en'=>'required|max:20',
            'price'=>'required',
            'details_ar'=>'required',
            'details_en'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'=>__('msgs.offer_name_req'),
            'name_ar.max'=>'طول الاسم يجب ان يكون اقل من 20 حرف',
        ];
    }


}
