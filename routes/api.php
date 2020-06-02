<?php

Route::group(['prefix' => '/v1', 'as' => 'api.'], function () {
    Route::get('/', function(){
        return 'API Documentation here';
    });


});
