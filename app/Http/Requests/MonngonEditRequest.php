<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MonngonEditRequest extends Request
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
            'txtMNTittle'  => 'required',
            'txtMNResum'  => 'required',
            'txtMNContent' => 'required'
        ];
    }

    public function messages() {
        return [
            'required'   => '<div><strong  style="color: red;">Vui lòng không để trống trường này!</strong></div>'
        ];
    }
}
