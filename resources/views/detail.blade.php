@extends('app')
@section('title','商品詳細')
@section('content')

<!-- CSRFトークンをJavaScriptで使用するためのタグ -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Font Awesomeの読み込み -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
 

<body>
    <h1>商品詳細</h1>
            
                <p>商品名:{{ $product->product_name }}</p>
                <p>説明:{{ $product->description }}</p>
                <p>画像:</p><img src="{{ asset('storage/'.$product->img_path) }}" width="100">
                <p>金額:{{$product->price}}</p>
                <p>会社:{{$product->company}}</p>

                <!-- イイねボタン -->
                <div class="mb-3">
                    @auth
                    <button id="like-btn" class="border-0 bg-transparent"
                        data-product-id="{{ $product->id }}"
                        @if($product->likedBy(Auth::user())) style="color:red;"@endif>
                        <i class="fas fa-heart"></i><!-- Font Awesomeのハートアイコン -->
                    </button>
                    @endauth
                    <span id="like-count">{{ $product->likes()->count() }}</span>
                </div> 
                <a href="{{ route('confirm',$product->id) }}" class="btn btn-primary">カートに追加</a>
                <a href="{{ route('index',$product->id) }}" class="btn btn-primary">戻る</a>

                @vite(['resources/js/like.js'])
        
</body>
@endsection