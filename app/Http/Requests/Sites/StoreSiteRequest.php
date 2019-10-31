<?php

namespace App\Http\Requests\Sites;

use Illuminate\Foundation\Http\FormRequest;

class StoreSite extends FormRequest
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
            'name' => 'required | string | min:3 | max:128',
            'url' => 'required | string | min:4 | max:128',
            'https' => 'string | max:3',
            'comment' => 'string | max:255',
        ];
    }
}
