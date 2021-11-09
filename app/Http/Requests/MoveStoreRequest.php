<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoveStoreRequest extends FormRequest
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

            'code_move' => ['required', 'unique:moves'],
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'departure_day' => ['required'],
            'continent_id' => ['required'],
            'country_id' => ['required'],
            'province_id' => ['required']      

        ];
    }
}
