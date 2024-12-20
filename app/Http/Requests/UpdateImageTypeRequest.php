<?php

namespace App\Http\Requests;

use App\Models\ImageType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImageTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('image_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:image_types,name,' . request()->route('image_type')->id,
            ],
        ];
    }
}
