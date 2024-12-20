<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddDocumentRequest;
use App\Http\Requests\StoreAddDocumentRequest;
use App\Http\Requests\UpdateAddDocumentRequest;
use App\Models\AddDocument;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AddDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addDocuments = AddDocument::with(['type', 'media'])->get();

        $types = Type::get();

        return view('admin.addDocuments.index', compact('addDocuments', 'types'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addDocuments.create', compact('types'));
    }

    public function store(StoreAddDocumentRequest $request)
    {
        $addDocument = AddDocument::create($request->all());

        if ($request->input('file', false)) {
            $addDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addDocument->id]);
        }

        return redirect()->route('admin.add-documents.index');
    }

    public function edit(AddDocument $addDocument)
    {
        abort_if(Gate::denies('add_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addDocument->load('type');

        return view('admin.addDocuments.edit', compact('addDocument', 'types'));
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

        return redirect()->route('admin.add-documents.index');
    }

    public function show(AddDocument $addDocument)
    {
        abort_if(Gate::denies('add_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addDocument->load('type');

        return view('admin.addDocuments.show', compact('addDocument'));
    }

    public function destroy(AddDocument $addDocument)
    {
        abort_if(Gate::denies('add_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddDocumentRequest $request)
    {
        $addDocuments = AddDocument::find(request('ids'));

        foreach ($addDocuments as $addDocument) {
            $addDocument->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_document_create') && Gate::denies('add_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
