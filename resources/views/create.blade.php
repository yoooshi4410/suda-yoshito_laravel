<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録</title>
</head>

<body>
    <h1>商品登録画面</h1>
</body>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">商品名</label>
            <input type="text" name="product_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="number">価格</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="number">在庫数</label>
            <input type="number" name="stock" class="form-control">
        </div>
        <div class="form-group">
            <label for="text">商品説明</label>
            <textarea type="text" name="description"class="form-control"></textarea>
        </div>



    </form>

</html>