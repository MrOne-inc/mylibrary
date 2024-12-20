<?php

namespace App\Http\Requests;

use App\Models\AddDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_document_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:3',
                'max:255',
                'required',
            ],
            'file' => [
                'required',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
