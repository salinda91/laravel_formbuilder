<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'formbuilder', 'namespace' => 'Modules\FormBuilder\Http\Controllers'], function()
{
    Route::get('/', 'FormBuilderController@index');
    Route::post('/save', 'FormBuilderController@store');
    Route::get('/list', 'FormBuilderController@listForms');
    Route::get('/form/{id}/view', 'FormBuilderController@show');
});
