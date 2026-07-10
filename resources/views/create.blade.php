@extends('app')

@section('title','商品登録')

@section('content')

<body>
    <h1>商品登録画面</h1>
</body>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="text">商品名</label>
            <input type="text" name="product_name" class="form-control">

            @error('product_name')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="form-group">
            <label for="number">価格</label>
            <input type="number" name="price" class="form-control">

            @error('price')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="form-group">
            <label for="number">在庫数</label>
            <input type="number" name="stock" class="form-control">

            @error('stock')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="form-group">
            <label for="text">商品説明</label>
            <textarea type="text" name="description"class="form-control"></textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="image">画像</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
        
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
    </form>
        <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>

@endsection