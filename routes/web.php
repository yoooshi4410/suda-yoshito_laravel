<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
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
//イイね追加
Route::post('/products/{product}/like',[LikeController::class, 'likeProduct'])->middleware('auth');
//イイね削除
Route::delete('/products/{product}/like',[LikeController::class, 'unlikeProduct'])->middleware('auth');
//アカウント情報編集
Route::middleware('auth')->group(function(){
    Route::get('/mypage/account_edit',[UserController::class, 'account'])->name('account');
});
//アカウント情報更新処理
Route::put('/account_update',[UserController::class, 'userupdate'])->name('userupdate');
//お問い合わせフォーム画面
Route::get('/contact',[ContactController::class, 'showForm'])->name('contact.form');
//お問い合わせフォーム送信
Route::post('/contact',[ContactController::class, 'submitForm'])->name('contact.submit');




