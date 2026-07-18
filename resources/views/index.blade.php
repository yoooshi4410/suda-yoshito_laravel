@extends('app')
@section('title','商品一覧')
@section('content')
<body>
    <h1>商品一覧</h1>

        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名を入力">
            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="最低価格">
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="最高価格">
            <button class="search" type="submit">検索</button>
        </form>


    <table>
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
                <td>
                    @if($product->img_path)
                    <img src="{{ asset('storage/'.$product->img_path) }}" alt="{{ $product->product_name }}" width='100'>
                    @else
                    画像なし
                    @endif
                </td>
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