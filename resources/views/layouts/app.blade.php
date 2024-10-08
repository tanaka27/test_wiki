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
            <a href="/pages">Home</a> | 
            <a href="/page/create">Create New Page</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Wiki Site. All rights reserved.</p>
    </footer>
</body>
</html>
