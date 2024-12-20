<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Add Document
    Route::delete('add-documents/destroy', 'AddDocumentController@massDestroy')->name('add-documents.massDestroy');
    Route::post('add-documents/media', 'AddDocumentController@storeMedia')->name('add-documents.storeMedia');
    Route::post('add-documents/ckmedia', 'AddDocumentController@storeCKEditorImages')->name('add-documents.storeCKEditorImages');
    Route::resource('add-documents', 'AddDocumentController');

    // Type
    Route::delete('types/destroy', 'TypeController@massDestroy')->name('types.massDestroy');
    Route::resource('types', 'TypeController');

    // Logo
    Route::delete('logos/destroy', 'LogoController@massDestroy')->name('logos.massDestroy');
    Route::post('logos/media', 'LogoController@storeMedia')->name('logos.storeMedia');
    Route::post('logos/ckmedia', 'LogoController@storeCKEditorImages')->name('logos.storeCKEditorImages');
    Route::resource('logos', 'LogoController');

    // Image Type
    Route::delete('image-types/destroy', 'ImageTypeController@massDestroy')->name('image-types.massDestroy');
    Route::resource('image-types', 'ImageTypeController');

    // Content Type
    Route::delete('content-types/destroy', 'ContentTypeController@massDestroy')->name('content-types.massDestroy');
    Route::resource('content-types', 'ContentTypeController');

    // Add Content
    Route::delete('add-contents/destroy', 'AddContentController@massDestroy')->name('add-contents.massDestroy');
    Route::post('add-contents/media', 'AddContentController@storeMedia')->name('add-contents.storeMedia');
    Route::post('add-contents/ckmedia', 'AddContentController@storeCKEditorImages')->name('add-contents.storeCKEditorImages');
    Route::resource('add-contents', 'AddContentController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
