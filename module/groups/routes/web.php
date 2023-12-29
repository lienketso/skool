<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'groups';


Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','GroupsController@getIndex')
            ->name('wadmin::groups.index.get')->middleware('permission:groups_index');
        $router->get('create','GroupsController@getCreate')
            ->name('wadmin::groups.create.get')->middleware('permission:groups_create');
        $router->post('create','GroupsController@postCreate')
            ->name('wadmin::groups.create.post')->middleware('permission:groups_create');
        $router->get('edit/{id}','GroupsController@getEdit')
            ->name('wadmin::groups.edit.get')->middleware('permission:groups_edit');
        $router->post('edit/{id}','GroupsController@postEdit')
            ->name('wadmin::groups.edit.post')->middleware('permission:groups_edit');
        $router->get('remove/{id}','GroupsController@remove')
            ->name('wadmin::groups.remove.get')->middleware('permission:groups_delete');
        $router->get('change/{id}','GroupsController@changeStatus')
            ->name('wadmin::groups.change.get');
        $router->get('ishome/{id}','GroupsController@changeHome')
            ->name('wadmin::groups.ishome.get');
    });


});
