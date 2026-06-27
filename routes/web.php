<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//商品一覧
Route::get('/index',[ProductController::class, 'index']);
//商品登録
Route::get('/products/create',[ProductController::class, 'create'])->name('create');
//フォーム送信
Route::post('/products',[ProductController::class, 'store'])->name('store');
//詳細画面表示
Route::get('/products/{id}',[ProductController::class, 'show'])->name('detail');
//編集画面
Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('edit');
//更新処理
Route::put('/products/{id}',[ProductController::class, 'update'])->name('update');