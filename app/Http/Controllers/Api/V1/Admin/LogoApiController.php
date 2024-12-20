<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Resources\Admin\LogoResource;
use App\Models\Logo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('logo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LogoResource(Logo::with(['image_type'])->get());
    }

    public function store(StoreLogoRequest $request)
    {
        $logo = Logo::create($request->all());

        if ($request->input('image', false)) {
            $logo->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new LogoResource($logo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Logo $logo)
    {
        abort_if(Gate::denies('logo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LogoResource($logo->load(['image_type']));
    }

    public function update(UpdateLogoRequest $request, Logo $logo)
    {
        $logo->update($request->all());

        if ($request->input('image', false)) {
            if (! $logo->image || $request->input('image') !== $logo->image->file_name) {
                if ($logo->image) {
                    $logo->image->delete();
                }
                $logo->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($logo->image) {
            $logo->image->delete();
        }

        return (new LogoResource($logo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Logo $logo)
    {
        abort_if(Gate::denies('logo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
