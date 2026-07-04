<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title','TNGブログ')</title>
</head>

<body>
    <!-- ヘッダー部分 -->
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-primary-subtle">
        <!--<h3></h3>-->
        <div class="col-4">
        <div class="col-8">
            @auth
            ログインユーザー:{{ auth()->user()->name }}
            @else
            ゲストユーザー
            @endauth
        </div>

        <div class="col">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
        </a>
        </div>

    </header>
    


    <div class="container">
        <div class="row justify-content-center">
    <!-- フラッシュメッセージの表示 -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

    <!-- 各画面の中身 -->
            <div class="col-8">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>