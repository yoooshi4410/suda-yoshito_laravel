@extends('app')

@section('title','アカウント情報編集')

@section('content')

<body>
    <h1>アカウント情報編集</h1>
</body>

    <form action="{{ route('userupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="text">ユーザー名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name'),$user->name }}">

            @error('name')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="form-group">
            <label for="email">Eメール</label>
            <input type="email" name="email" class="form-control" value="{{ old('email'),$user->email }}">

            @error('email')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="text">名前</label>
            <input type="text" name="name_kanji" class="form-control" value="{{ old('name_kanji'),$user->name_kanji }}">

            @error('name_kanji')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="text">カナ</label>
            <input type="text" name="name_kana" class="form-control" value="{{ old('name_kana'),$user->name_kana }}">

            @error('name_kana')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>

    </form>

@endsection


        