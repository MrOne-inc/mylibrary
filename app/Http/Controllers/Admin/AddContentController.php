<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddContentRequest;
use App\Http\Requests\StoreAddContentRequest;
use App\Http\Requests\UpdateAddContentRequest;
use App\Models\AddContent;
use App\Models\ContentType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AddContentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContents = AddContent::with(['type'])->get();

        return view('admin.addContents.index', compact('addContents'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = ContentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addContents.create', compact('types'));
    }

    public function store(StoreAddContentRequest $request)
    {
        $addContent = AddContent::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addContent->id]);
        }

        return redirect()->route('admin.add-contents.index');
    }

    public function edit(AddContent $addContent)
    {
        abort_if(Gate::denies('add_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = ContentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addContent->load('type');

        return view('admin.addContents.edit', compact('addContent', 'types'));
    }

    public function update(UpdateAddContentRequest $request, AddContent $addContent)
    {
        $addContent->update($request->all());

        return redirect()->route('admin.add-contents.index');
    }

    public function show(AddContent $addContent)
    {
        abort_if(Gate::denies('add_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContent->load('type');

        return view('admin.addContents.show', compact('addContent'));
    }

    public function destroy(AddContent $addContent)
    {
        abort_if(Gate::denies('add_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddContentRequest $request)
    {
        $addContents = AddContent::find(request('ids'));

        foreach ($addContents as $addContent) {
            $addContent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_content_create') && Gate::denies('add_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
