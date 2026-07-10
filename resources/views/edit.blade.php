@extends('app')

@section('title','出品商品詳細')

@section('content')

<body>
    <h1>出品商品編集</h1>
</body>

    <form action="{{ route('update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="text">商品名</label>
            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">

            @error('product_name')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="form-group">
            <label for="number">価格</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">

            @error('price')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="text">商品説明</label>
            <textarea type="text" name="description"class="form-control">{{ $product->description }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="number">在庫数</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">

            @error('stock')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="image">画像</label>
            @if($product->img_path)
            <img src="{{ asset('storage/'.$product->img_path) }}" width="100">
            @endif
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
        
            @enderror
        </div>
       

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('mypagedetail',$product->id) }}" class="btn btn-primary">戻る</a>

    </form>

@endsection


        