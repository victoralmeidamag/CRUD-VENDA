<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <body>
        @if(session('success'))
            <script>alert("{{ session('success') }}");</script>
        @endif
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form action= "{{ route('registro.salvar')}}"  method="post" id="signup" enctype="multipart/form-data">
                    @csrf
                    <h1>Crie sua conta</h1>
                    <input type="text" id="nomeCadastrar" name="nomeCadastrar" placeholder="Primeiro nome" required>
                    @error('nomeCadastrar')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                    <input type="text" id="sobrenomeCadastrar" name="sobrenomeCadastrar" placeholder="Ultimo nome" required/>
                    @error('sobrenomeCadastrar')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                    <input type="email" id="emailCadastrar" name="emailCadastrar" placeholder="Email" required>
                    @error('emailCadastrar')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                    <input type="password" id="senhaCadastrar" name="senhaCadastrar" placeholder="Senha" required>
                    @error('senhaCadastrar')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                    <button id="btn_cadastrar">Cadastrar</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form action="{{ route('registro.logar') }}" method="post">
                    @csrf
                    <h1>Entrar</h1>
                    <input type="email" name="email" placeholder="E-mail"> 
                    <input type="password" name="password" placeholder="Senha"> 
                    <button type="submit" id="btn_entrar">Entrar</button>
                </form>
            </div>
            
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Faça seu login!</h1>
                        <p>Já tem cadastro? Faça o login!</p>
                        <button class="submit" id="login">Entrar</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Olá!</h1>
                        <p>Ainda não tem cadastro?<br>Faça o seu primeiro cadastro</p>
                        <button class="hidden" id="register">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>
</html>