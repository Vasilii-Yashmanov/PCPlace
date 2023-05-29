<!DOCTYPE html>
<html>
<head>
    <title>PC Place</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('categories.show') }}">PC Place - Магазин компьютерной техники</a>
            <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                
            </div>
            <div class="ml-auto" style="margin-right: 200px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.show') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.view') }}">Корзина</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>