<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品一覧</title>
</head> -->
@extends('app')
@section('title','商品一覧')
@section('content')
<body>
    <h1>商品一覧</h1>

    <a href="{{ route('create') }}" class="btn btn-success mb-3">新規登録</a>
    <table border="1">
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金(¥)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->img_path}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{ route('detail',$product->id) }}" class="btn btn-primary">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection