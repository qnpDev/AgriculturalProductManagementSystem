<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TuyendungEditRequest extends Request
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
            'txtTDTittle'  => 'required|max:255',
            'txtTDIntro' => 'required',
            'txtTDContact'  => 'required',
            'txtTDDate'  => 'required|integer',
            'fImage' => 'mimes:jpeg,bmp,png|max:4000'
        ];
    }

    public function messages() {
        return [
            'required'   => '<div><strong  style="color: red;">Vui lòng không để trống trường này!</strong></div>',
            'txtTDDate.integer'   => '<div><strong  style="color: red;">Please type integer!</strong></div>',
            'mimes' => '<div><strong  style="color: red;">Vui lòng chọn đúng file ảnh</strong></div>',
            'fImage.max' => '<div><strong  style="color: red;">Vui lòng chọn file ảnh có kích thước không quá 2MB</strong></div>',
            'txtTDTittle.max' => '<div><strong  style="color: red;">Max size is 255</strong></div>'
        ];
    }
}
