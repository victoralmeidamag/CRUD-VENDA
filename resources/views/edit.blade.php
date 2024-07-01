@include('header.header')

<div class="container">
    <h2>Editar Usuário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-top: 10px" class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        
        <div style="margin-top: 10px" class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" value="{{ $user->sobrenome }}" required>
        </div>
        
        <div style="margin-top: 10px" class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        
        <div style="margin-top: 10px" class="form-group">
            <label for="tipo">Tipo: </label>
            <select name="tipo" id="tipo">
                <option value="1">ADM</option>
                <option value="0">USUÁRIO</option>
            </select>
        </div>

        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
