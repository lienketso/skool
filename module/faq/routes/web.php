<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'faq';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','FaqController@getIndex')
            ->name('wadmin::faq.index.get')->middleware('permission:faq_index');
        $router->get('create','FaqController@getCreate')
            ->name('wadmin::faq.create.get')->middleware('permission:faq_create');
        $router->post('create','FaqController@postCreate')
            ->name('wadmin::faq.create.post')->middleware('permission:faq_create');
        $router->get('edit/{id}','FaqController@getEdit')
            ->name('wadmin::faq.edit.get')->middleware('permission:faq_edit');
        $router->post('edit/{id}','FaqController@postEdit')
            ->name('wadmin::faq.edit.post')->middleware('permission:faq_edit');
        $router->get('remove/{id}','FaqController@remove')
            ->name('wadmin::faq.remove.get')->middleware('permission:faq_delete');
        $router->get('change/{id}','FaqController@changeStatus')
            ->name('wadmin::faq.change.get');
    });



});
