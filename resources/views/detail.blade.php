<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品詳細</title>
</head>

<body>
    <h1>商品詳細</h1>
            
                <p>商品名:{{ $product->product_name }}</p>
                <p>説明:{{ $product->description }}</p>
                <p>画像:{{$product->img_path}}</p>
                <p>金額:{{$product->price}}</p>
                <p>会社:{{$product->company}}</p>

                <a href="{{ route('index',$product->id) }}" class="btn btn-primary">戻る</a>

        
</body>
</html>