<?php

namespace App\Http\Requests;

use App\Models\Type;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:types,name,' . request()->route('type')->id,
            ],
        ];
    }
}
