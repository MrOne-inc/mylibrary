<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddDocumentRequest;
use App\Http\Requests\UpdateAddDocumentRequest;
use App\Http\Resources\Admin\AddDocumentResource;
use App\Models\AddDocument;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddDocumentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddDocumentResource(AddDocument::with(['type'])->get());
    }

    public function store(StoreAddDocumentRequest $request)
    {
        $addDocument = AddDocument::create($request->all());

        if ($request->input('file', false)) {
            $addDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        return (new AddDocumentResource($addDocument))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddDocument $addDocument)
    {
        abort_if(Gate::denies('add_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddDocumentResource($addDocument->load(['type']));
    }

    public function update(UpdateAddDocumentRequest $request, AddDocument $addDocument)
    {
        $addDocument->update($request->all());

        if ($request->input('file', false)) {
            if (! $addDocument->file || $request->input('file') !== $addDocument->file->file_name) {
                if ($addDocument->file) {
                    $addDocument->file->delete();
                }
                $addDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($addDocument->file) {
            $addDocument->file->delete();
        }

        return (new AddDocumentResource($addDocument))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddDocument $addDocument)
    {
        abort_if(Gate::denies('add_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addDocument->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
