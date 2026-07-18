@extends('app')
@section('title','購入画面')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>購入画面</title>
</head>

<body>
    <h1>購入画面</h1>
            
                <p>商品名:{{ $product->product_name }}</p>
                <p>説明:{{ $product->description }}</p>
                <p>画像:</p><img src="{{ asset('storage/'.$product->img_path) }}" width="100">

            <form action="{{ route('purchase') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <p>残り在庫：{{ $product->stock }}</p>

                <label for="quantity">購入数</label>

                <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                        max="{{ $product->stock }}">

                
                        <button type="submit" class="btn btn-primary">購入する</button>
            </form>

                <p>金額:{{$product->price}}</p>
                <p>会社:{{$product->company}}</p>

                <a href="{{ route('detail',$product->id) }}" class="btn btn-primary">戻る</a>

        
</body>
@endsection