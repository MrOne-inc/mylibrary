<?php

namespace App\Http\Requests;

use App\Models\Logo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLogoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('logo_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'image' => [
                'required',
            ],
            'image_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
