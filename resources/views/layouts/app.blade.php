<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wiki Site')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('custom_css')

</head>
<body>
    <header>
        <nav>
            <a href="/pages">Home</a> 
            @auth
                |<a href="/page/create">Create New Page</a>
                |<button type="submit" form="logout-form" id="logout-button">ログアウト</button>
                <form action="/logout" method="POST" id="logout-form" hidden>
                    @csrf
                </form>
            @else
                |<a href="/login">ログイン</a>
                |<a href="/register">新規登録</a>

            @endauth
        </nav>
    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('fail'))
        <div class="alert alert-fail">
            {{ session('fail') }}
        </div>
    @endif
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Wiki Site. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @yield('scripts')
</body>
</html>