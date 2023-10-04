<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$FrontRoute = 'frontend';
$moduleRoute = 'home';

Route::get('api-login-hai-bon-bay','HomeController@getTokenApi')->name('frontend::get-hai-bon-bay');

Route::get('/', 'HomeController@getIndex')->name('frontend::home');
Route::get('lang/{lang}', 'HomeController@changeLang')->name('frontend::lang');

Route::group(['prefix'=>'page'],function(Router $router){
    $router->get('{slug}','BlogController@page')
        ->name('frontend::page.index.get');
});

Route::group(['prefix'=>'member'],function(Router $router){
    $router->get('register','MemberController@register')
        ->name('frontend::member.register.get');
    $router->post('register','MemberController@postRegister')
        ->name('frontend::member.register.post');
    $router->get('login','MemberController@login')
        ->name('frontend::member.login.get');
    $router->post('login','MemberController@postLogin')
        ->name('frontend::member.login.post');
    $router->get('logout','MemberController@logout')
        ->name('frontend::member.logout.get');
    $router->get('profile','MemberController@profile')
        ->name('frontend::member.profile.get')->middleware('auth');
    $router->get('edit-profile','MemberController@editProfile')
        ->name('frontend::member.edit-profile.get')->middleware('auth');
    $router->post('edit-profile','MemberController@postEditProfile')
        ->name('frontend::member.edit-profile.post')->middleware('auth');
    $router->get('change-password','MemberController@changePassword')
        ->name('frontend::member.change-password.get')->middleware('auth');
    $router->post('change-password','MemberController@postChangePassword')
        ->name('frontend::member.change-password.post')->middleware('auth');
});

Route::group(['prefix'=>'group'],function(Router $router){
    $router->get('join-group/{slug}','GroupController@joinGroup')
        ->name('frontend::group.join.get')->middleware('auth');
    $router->get('create-room','GroupController@createRoom')
        ->name('frontend::group.create-room.get')->middleware('auth');
    $router->get('edit-room/{slug}','GroupController@editRoom')
        ->name('frontend::group.edit-room.get')->middleware('auth');
    $router->post('create-room','GroupController@postCreateRoom')
        ->name('frontend::group.create-room.post')->middleware('auth');
    $router->post('edit-room/{slug}','GroupController@postEditRoom')
        ->name('frontend::group.edit-room.post')->middleware(['auth']);
});

Route::group(['prefix'=>'class'],function(Router $router) {
    $router->get('{slug}/classroom', 'GroupController@classroom')
        ->name('frontend::group.classroom.get');
    $router->get('classroom-detail/{id}', 'GroupController@classroomDetail')
        ->name('frontend::group.classroom-detail.get');
    $router->get('remove-class-room/{id}','ClassController@removeClass')
        ->name('frontend::remove-class-room.get')->middleware('auth');

});
Route::get('/{slug}', 'GroupController@indexGroup')->name('frontend::group.index.get');
Route::get('/{slug}/members', 'GroupController@getMembers')->name('frontend::group.member.get');
//post new classroom
Route::group(['prefix'=>'post'],function(Router $router) {
    $router->post('/new-class-room', 'GroupController@postClassroom')
        ->name('frontend::new.class.post')
        ->middleware('auth');
    $router->get('/get-posts-class-room/{id}', 'ClassController@getPostClassroom')
        ->name('frontend::create.post.get')->middleware('auth');
    $router->get('remove-set-name/{id}','ClassController@removeSet')->name('frontend::set.remove.get')->middleware('auth');
    $router->get('/get-create-module/{id}', 'ClassController@createModule')
        ->name('frontend::create-module.get')->middleware('auth');
    $router->post('/get-create-module/{id}', 'ClassController@postCreateModule')
        ->name('frontend::create-module.post')->middleware('auth');
    $router->get('get-remove-module/{id}','ClassController@removewModule')->name('frontennd::remove-module.get')->middleware('auth');
    $router->get('get-edit-module/{id}','ClassController@editModule')->name('frontennd::edit-module.get')->middleware('auth');
    $router->post('get-edit-module/{id}','ClassController@postEditModule')->name('frontennd::edit-module.post')->middleware('auth');
});



