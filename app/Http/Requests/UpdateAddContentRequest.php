<?php

namespace App\Http\Requests;

use App\Models\AddContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_content_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
