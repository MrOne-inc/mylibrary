@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.logo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.logos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.logo.fields.id') }}
                        </th>
                        <td>
                            {{ $logo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.logo.fields.name') }}
                        </th>
                        <td>
                            {{ $logo->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.logo.fields.image') }}
                        </th>
                        <td>
                            @if($logo->image)
                                <a href="{{ $logo->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $logo->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.logo.fields.image_type') }}
                        </th>
                        <td>
                            {{ $logo->image_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.logos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection