<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJETO HCOSTA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @vite('resources/css/nav.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header class="header">
        <nav class="nav container">
            @php
                $tipo = session('user_tipo') === 1 ? '(admin)' : '';
            @endphp
            <a href="{{Route('index')}}" class="nav__logo"> {{ session('user_name') .' ' . session('user_sobrenome') . ' '. $tipo}}</a>
            <input type="checkbox" id="nav-toggler" style="display: none;">
            <label for="nav-toggler" class="nav__toggle">
                <i class="fa-solid fa-bars"></i>
            </label>

            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{Route('index')}}" class="nav__link">Inicio</a>
                </li>
                <li class="nav__item">
                    <a href="{{Route('compras_user', session('user_id'))}}" class="nav__link ">Minhas compras</a>
                </li>
                <li class="nav__item">
                    <a href="{{route('itens')}}" class="nav__link">Lista de produtos</a>
                </li>
                @if (session('user_tipo') === 1)
                <li class="nav__item">
                    <a href="{{Route('compras')}}" class="nav__link">Lista de Compras (somente adm)</a>
                </li>
                <li class="nav__item">
                    <a href="{{route('usuarios')}}" class="nav__link">Usuários Cadastrados (somente ADM)</a>
                </li>
                @endif
                <li class="nav__item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                            <i class="fa fa-xmark"></i> Sair
                        </button>
                    </form>
                </li>
            </ul>

        </nav>
    </header>
</body>
</html>