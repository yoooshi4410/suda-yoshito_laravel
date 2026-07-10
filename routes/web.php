<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//商品一覧
Route::get('/index',[ProductController::class, 'index'])->name('index');
//商品登録
Route::get('/products/create',[ProductController::class, 'create'])->name('create');
//フォーム送信
Route::post('/products',[ProductController::class, 'store'])->name('store');
//詳細画面表示
Route::get('/products/{id}',[ProductController::class, 'show'])->name('detail');
//編集画面
Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('edit');
//更新処理
Route::put('/mypage/products/{id}',[ProductController::class, 'update'])->name('update');
//mマイページ
Route::get('/mypage',[ProductController::class, 'mypage'])->name('mypage');
//出品商品詳細
Route::get('/mypage/products/{id}',[ProductController::class, 'mypagedetail'])->name('mypagedetail');
//削除機能
Route::delete('/mypage/products/{id}',[ProductController::class, 'destroy'])->name('destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//購入画面へ
Route::get('/products/{id}/purchase',[SaleController::class, 'confirm'])->name('confirm');

Route::post('/products/purchase',[SaleController::class, 'purchase'])->name('purchase');

