<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuldingRequest extends FormRequest
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
            'name'       =>'required|min:5|max:100',
            'price'      =>'required',
            'rent'       =>'required|integer',
            'square'     =>'required|min:2|max:100',
            'type'       =>'required|integer',
            'small_desc' =>'required|min:5|max:160',
            'meta'       =>'required|min:5|max:200',
            'langitude'  =>'required',
            'latitude'   =>'required',
            'large_desc' =>'required|min:5',
            'status'     =>'required|integer',
            'rooms'      =>'required|integer',
            'photos'     =>'required',
            'place'      =>'required'
        ];
    }
}
