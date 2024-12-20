<?php

namespace App\Http\Requests;

use App\Models\ImageType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreImageTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('image_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:image_types',
            ],
        ];
    }
}
