<?php

namespace App\Http\Requests;

use App\Models\ContentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
            ],
        ];
    }
}
