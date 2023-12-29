<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'setting';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','SettingController@getIndex')
            ->name('wadmin::setting.index.get')->middleware('permission:setting_index');
        $router->post('index','SettingController@postIndex')
            ->name('wadmin::setting.index.post')->middleware('permission:setting_index');
        $router->get('fact','SettingController@getFact')
            ->name('wadmin::setting.fact.get')->middleware('permission:setting_fact');
        $router->post('fact','SettingController@postFact')
            ->name('wadmin::setting.fact.post')->middleware('permission:setting_fact');
        $router->get('keyword','SettingController@getKeyword')
            ->name('wadmin::setting.keyword.get')->middleware('permission:setting_keyword');
        $router->post('keyword','SettingController@postKeyword')
            ->name('wadmin::setting.keyword.post')->middleware('permission:setting_keyword');
        $router->get('box','SettingController@getBox')
            ->name('wadmin::setting.box.get')->middleware('permission:setting_index');
        $router->post('box','SettingController@postBox')
            ->name('wadmin::setting.box.post')->middleware('permission:setting_index');

        $router->get('why','SettingController@getWhy')
            ->name('wadmin::setting.why.get')->middleware('permission:setting_index');
        $router->post('why','SettingController@postWhy')
            ->name('wadmin::setting.why.post')->middleware('permission:setting_index');
    });
});
