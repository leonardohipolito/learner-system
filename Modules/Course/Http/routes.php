<?php

Route::group(['middleware' => 'web', 'prefix' => 'course/admin', 'namespace' => 'Modules\Course\Http\Controllers\Admin'], function () {
    Route::resource('businesses', 'BusinessController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('courses', 'CourseController');
    Route::resource('modules', 'ModuleController');
    Route::resource('files', 'FileController');
    Route::get('/files/{id}/complete', ['uses' => 'FileController@complete', 'as' => 'course.admin.files.complete']);
    Route::post('/files/upload/{course_id}/module', ['uses' => 'FileController@module', 'as' => 'course.admin.courses.module']);
    Route::post('/files/upload/{module_id}', ['uses' => 'FileController@upload', 'as' => 'course.admin.courses.upload']);
});
Route::resource('/', 'Modules\Course\Http\Controllers\Admin\CourseController@index');
