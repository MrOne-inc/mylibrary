<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageTypeRequest;
use App\Http\Requests\UpdateImageTypeRequest;
use App\Http\Resources\Admin\ImageTypeResource;
use App\Models\ImageType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('image_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageTypeResource(ImageType::all());
    }

    public function store(StoreImageTypeRequest $request)
    {
        $imageType = ImageType::create($request->all());

        return (new ImageTypeResource($imageType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ImageType $imageType)
    {
        abort_if(Gate::denies('image_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageTypeResource($imageType);
    }

    public function update(UpdateImageTypeRequest $request, ImageType $imageType)
    {
        $imageType->update($request->all());

        return (new ImageTypeResource($imageType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ImageType $imageType)
    {
        abort_if(Gate::denies('image_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
