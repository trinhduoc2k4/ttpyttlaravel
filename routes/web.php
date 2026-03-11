<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ThumbnailsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LibController;

//app
Route::controller(AppController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/gioi-thieu/{slug}', 'gioiThieu');
    Route::get('/giam-dinh-pytt/{slug}', 'giamDinhPYTT');
    Route::get('/tin-tuc/{slug}', 'listPost')->name('list');
    Route::get('/tin-tuc/{slug}/{id}/{slugPost}', 'detailPost')->name('read');
    Route::get('/thu-vien/{slug}/search', 'legalDocSearch')->name('legal.search');
    Route::get('/thu-vien/album', 'listAlbum')->name('album.index');
    Route::get('/thu-vien/{slug}', 'vanBan')->name('legal.index');
    Route::get('/thu-vien/{slug}/{id}', 'vanBanDetail')->name('legal.detail');
    Route::get('/thong-bao/{id}/{slug}', 'detailNoti')->name('noti.detail');
    Route::get('/thong-bao', 'listNoti')->name('noti.index');
});

//admin
Route::middleware('admin')->controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::get('/admin/logout', 'logout')->name('logout');
});
Route::get('/admin/login', [AdminController::class, 'formLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('post.login');

//post
Route::middleware('admin')->controller(PostsController::class)->group(function () {
    Route::get('/admin/post/list-post/{slug}/{idCategory}', 'index')->name('index');
    Route::get('/admin/post/add-post/{slug}/{idCategory}', 'formCreate')->name('get.create');
    Route::post('/admin/post/add-post/upload', 'upload')->name('upload');;
    Route::post('/admin/post/add-post/{slug}/{idCategory}', 'create')->name('post.create');;
    Route::get('/admin/post/edit-post/{slug}/{idCategory}/{idPost}', 'edit')->name('edit');
    Route::put('/admin/post/edit-post/{slug}/{idCategory}/{idPost}', 'update')->name('update');
    Route::delete('/admin/post/delete-post/{id}', 'delete')->name('delete');
});

//thumbnail
Route::controller(ThumbnailsController::class)->group(function () {
    Route::get('/admin/thumbnail/list', 'index')->name('thumbnail.index');
    Route::get('/admin/thumbnail/add', 'formCreate')->name('thumbnail.get.create');
    Route::post('/admin/thumbnail/add', 'create')->name('thumbnail.post.create');
    Route::get('/admin/thumbnail/edit/{id}', 'formEdit')->name('thumbnail.edit');
    Route::put('/admin/thumbnail/edit/{id}', 'update')->name('thumbnail.update');
    Route::delete('/admin/thumbnail/delete/{id}', 'delete')->name('thumbnail.delete');
});

//lib
Route::controller(LibController::class)->group(function () {
    //album
    Route::get('/admin/lib/list/album', 'albumIndex')->name('album.get.index');
    Route::get('/admin/lib/add/album', 'formCreateAlbum')->name('album.get.create');
    Route::post('/admin/lib/add/album', 'createAlbum')->name('album.post.create');
    Route::get('/admin/lib/edit/album/{id}', 'formEditAlbum')->name('album.edit');
    Route::put('/admin/lib/edit/album/{id}', 'updateAlbum')->name('album.update');
    Route::delete('/admin/lib/delete/album/{id}', 'deleteAlbum')->name('album.delete');
    //doc
    Route::get('/admin/lib/list/{slug}', 'index')->name('lib.index');
    Route::get('/admin/lib/add/{slug}', 'formCreate')->name('lib.get.create');
    Route::post('/admin/lib/add/{slug}', 'create')->name('lib.post.create');
    Route::get('/admin/lib/edit/{slug}/{id}', 'formEdit')->name('lib.edit');
    Route::put('/admin/lib/edit/{slug}/{id}', 'update')->name('lib.update');
    Route::delete('/admin/lib/delete/{slug}/{id}', 'delete')->name('lib.delete');
});

//user
Route::middleware(['admin', 'checkRole'])->controller(UsersController::class)->group(function () {
    Route::get('/admin/user/list', 'index')->name('user.index');
    Route::get('/admin/user/add', 'formCreate')->name('user.get.create');
    Route::post('/admin/user/add', 'create')->name('user.post.create');
    Route::delete('admin/user/delete/{id}', 'delete')->name('user.delete');
});
