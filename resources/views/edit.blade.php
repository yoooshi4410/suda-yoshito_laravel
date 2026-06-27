<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>出品商品編集</title>
</head>

<body>
    <h1>出品商品編集</h1>
</body>

    <form action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">商品名</label>
            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
        </div>
        <div class="form-group">
            <label for="number">価格</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="number">在庫数</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
        </div>
        <div class="form-group">
            <label for="text">商品説明</label>
            <textarea type="text" name="description"class="form-control"> value="{{ $product->description }}"</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('detail',$product->id) }}" class="btn btn-primary">戻る</a>

    </form>

</html>


        