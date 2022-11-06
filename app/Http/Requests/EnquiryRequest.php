<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
            'name'                 => 'required',
            'email'                => 'required|email',
            'message'              => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    /**
     * Override error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required'  => 'The recaptcha field is required.',
            'g-recaptcha-response.recaptcha' => 'The recaptcha field is incorrect.',
        ];
    }
}
