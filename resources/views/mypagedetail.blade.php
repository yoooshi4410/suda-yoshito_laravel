@extends('app')

@section('title','出品商品詳細')

@section('content')
</head>

<body>
    <h1>出品商品詳細</h1>
            
                <p>商品名:{{ $product->product_name }}</p>
                <p>説明:{{ $product->description }}</p>
                <p>画像:</p><img src="{{ asset('storage/'.$product->img_path) }}" width="100">
                <p>金額:{{$product->price}}</p>
                <p>会社:{{$product->company}}</p>

                <a href="{{ route('edit',$product->id) }}">編集</a>

                <form action="{{ route('destroy',$product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
                </form>

                <a href="{{ route('mypage',$product->id) }}" class="btn btn-primary">戻る</a>


        
</body>
@endsection