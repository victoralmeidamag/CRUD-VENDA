@include('header.header')
<body>
    <table id="tabela"  style="margin-top: 30px" class="table table-dark text-center">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">DESCRIÇÃO</th>
                <th class="text-center">VALOR</th>
                <th class="text-center">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ strtoupper($item['descricao']) }}</td>
                <td>{{ $item['valor'] }}</td>
                    <td>
                        <form action="{{ route('compras.inserir', ['usuario' => session('user_id'), 'idProduto' => $item['id']]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                                <i class="fa fa-plus"></i>
                            </button>
                        </form>
                    </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

<script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

</html>
