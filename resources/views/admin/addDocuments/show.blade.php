@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $addDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addDocument.fields.title') }}
                        </th>
                        <td>
                            {{ $addDocument->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addDocument.fields.file') }}
                        </th>
                        <td>
                            @if($addDocument->file)
                                <a href="{{ $addDocument->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addDocument.fields.description') }}
                        </th>
                        <td>
                            {!! $addDocument->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addDocument.fields.type') }}
                        </th>
                        <td>
                            {{ $addDocument->type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection