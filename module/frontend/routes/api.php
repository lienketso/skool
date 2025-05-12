<?php

use Illuminate\Support\Facades\Route;

Route::get('create-newsletter','HomeController@createNewletter')->name('ajax.newsletter.get');
Route::post('create-post-group','ApiController@apiPostGroup')->name('ajax.create.post-group.get');
Route::post('edit-post-group','ApiController@apiEditPostGroup')->name('ajax.edit.post-group.get');
Route::post('upload-media-file','ApiController@UploadFile')->name('ajax.upload-media-file.post');
//create category
Route::post('create-new-category','ApiController@apiCreateCategory')->name('ajax-create-category');
//edit category
Route::post('edit-category-set','ApiController@apiEditCategory')->name('ajax-edit-category');
//edit category parent
Route::post('edit-category-parent','ApiController@apiEditCategoryParent')->name('ajax-edit-category-parent');
Route::post('upload-edit-category-parent','ApiController@uploadEditFileCategory')->name('ajax-edit-file-category-parent');
//Đánh dấu đã đọc
Route::post('mark-as-read','ApiController@markAsRead')->name('ajax-mark-as-read-module');
// bỏ đánh dấu
Route::post('mark-as-unread','ApiController@markAsUnread')->name('ajax-mark-as-unread-module');
//like post group
Route::post('like-post-group','ApiController@likePost')->name('ajax-like-post-group');
//comment post
Route::post('comment-post-group','ApiController@commentPost')->name('ajax-comment-post-group');
//like comment
Route::post('like-comment-group','ApiController@likeComment')->name('ajax-comment-like-group');
//change bank
Route::post('get-bank-item','ApiController@getBankItem')->name('ajax-get-bank-item');
//insert video
Route::post('/insert-video', ['ApiController@insertVideo', 'ajax-insert-video']);
