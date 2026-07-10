@extends('app')

@section('title','マイページ')

@section('content')

<h1>マイページ</h1>

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
                <td><img src="{{ asset('storage/'.$product->img_path) }}" width="100"></td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{ route('mypagedetail',$product->id) }}" class="btn btn-primary">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection