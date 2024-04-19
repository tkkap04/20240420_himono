<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/app.css') }}" />
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>FashionablyLate</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__inner-title">FashionablyLate</h1>
        </div>
        @yield('action')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>