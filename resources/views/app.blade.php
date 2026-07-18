<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title','TNGブログ')</title>
</head>

<body>
    <!-- ヘッダー部分 -->
    <header class="header">
        <h1>Cytech EC</h1>
        <nav class="menu">
            <!--<h3></h3>-->
            <div >
            <div >
                <a href="/index">Home</a>
                <a href="/mypage">マイページ</a>
                @auth
                ログインユーザー:{{ auth()->user()->name }}
                @else
                ゲストユーザー
                @endauth
            </div>

            <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
                <a class="btn btn-outline-danger logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
            </div>
        </nav>

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

    <footer class="footer">
        <a href="{{ route('contact.form') }}" class="btn btn-primary button">お問い合わせ</a>
        <nav class="menu_footer">
            <a href="/index">Home</a>
            <a href="/mypage">マイページ</a>
        </nav>
        <p>@2026 Company.inc</p>
    </footer>
</body>