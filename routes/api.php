<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Add Document
    Route::post('add-documents/media', 'AddDocumentApiController@storeMedia')->name('add-documents.storeMedia');
    Route::apiResource('add-documents', 'AddDocumentApiController');

    // Type
    Route::apiResource('types', 'TypeApiController');

    // Logo
    Route::post('logos/media', 'LogoApiController@storeMedia')->name('logos.storeMedia');
    Route::apiResource('logos', 'LogoApiController');

    // Image Type
    Route::apiResource('image-types', 'ImageTypeApiController');

    // Content Type
    Route::apiResource('content-types', 'ContentTypeApiController');

    // Add Content
    Route::post('add-contents/media', 'AddContentApiController@storeMedia')->name('add-contents.storeMedia');
    Route::apiResource('add-contents', 'AddContentApiController');
});
