@include('header.header')

<h1>Lista de usuários</h1>
<table id="tabela" class="table table-dark text-center">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">NOME</th>
            <th class="text-center">SOBRENOME</th>
            <th class="text-center">TIPO</th>
            <th class="text-center">COMPRAS</th>
            <th class="text-center">AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ strtoupper($usuario->name) }}</td>
            <td>{{ $usuario->sobrenome }}</td>
            <td>{{$usuario->tipo == 1 ? 'VENDEDOR' : 'USUÁRIO'}}</td>
            <td><a href="">Ir</a></td>
            <td>
                <a href="{{ Route('user.edit', $usuario->id) }}"><i class="fa fa-edit"></i></a>
                <form action="{{ route('user.destroy', $usuario->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>