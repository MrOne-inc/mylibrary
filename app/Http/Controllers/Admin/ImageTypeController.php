<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImageTypeRequest;
use App\Http\Requests\StoreImageTypeRequest;
use App\Http\Requests\UpdateImageTypeRequest;
use App\Models\ImageType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('image_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageTypes = ImageType::all();

        return view('admin.imageTypes.index', compact('imageTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('image_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageTypes.create');
    }

    public function store(StoreImageTypeRequest $request)
    {
        $imageType = ImageType::create($request->all());

        return redirect()->route('admin.image-types.index');
    }

    public function edit(ImageType $imageType)
    {
        abort_if(Gate::denies('image_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageTypes.edit', compact('imageType'));
    }

    public function update(UpdateImageTypeRequest $request, ImageType $imageType)
    {
        $imageType->update($request->all());

        return redirect()->route('admin.image-types.index');
    }

    public function show(ImageType $imageType)
    {
        abort_if(Gate::denies('image_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageTypes.show', compact('imageType'));
    }

    public function destroy(ImageType $imageType)
    {
        abort_if(Gate::denies('image_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageType->delete();

        return back();
    }

    public function massDestroy(MassDestroyImageTypeRequest $request)
    {
        $imageTypes = ImageType::find(request('ids'));

        foreach ($imageTypes as $imageType) {
            $imageType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
