<?php

namespace App\Http\Requests;

use App\Models\AddDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_documents,id',
        ];
    }
}
