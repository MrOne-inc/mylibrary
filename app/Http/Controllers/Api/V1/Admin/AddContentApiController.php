<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddContentRequest;
use App\Http\Requests\UpdateAddContentRequest;
use App\Http\Resources\Admin\AddContentResource;
use App\Models\AddContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddContentResource(AddContent::with(['type'])->get());
    }

    public function store(StoreAddContentRequest $request)
    {
        $addContent = AddContent::create($request->all());

        return (new AddContentResource($addContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddContent $addContent)
    {
        abort_if(Gate::denies('add_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddContentResource($addContent->load(['type']));
    }

    public function update(UpdateAddContentRequest $request, AddContent $addContent)
    {
        $addContent->update($request->all());

        return (new AddContentResource($addContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddContent $addContent)
    {
        abort_if(Gate::denies('add_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
