@include('header.header')

<body>
    <table id="tabela"  style="margin-top: 30px" class="table table-dark text-center">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">DESCRIÇÃO</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">VALOR</th>
                @if (session('user_tipo') === 1)                    
                <th class="text-center">EDITAR</th>
                @endif

            </tr>
        </thead>
        <tbody>
            
            @foreach ($compras as $item)
            <tr>
                @php
                    $usuario = App\Http\Controllers\UserController::usuario($item->user);
                @endphp
                <td>{{ $usuario->name }}</td>
                @php
                $produto = App\Http\Controllers\ProductController::getItem($item->produto);
                @endphp
                <td>{{ strtoupper($produto['descricao']) }}</td>
                <td>{{$item->status === 0 ? 'PENDENTE' : ($item->status === 1 ? 'PAGO' : 'CANCELADO')}}</td>
                <td>{{$produto['valor']}}</td>
                @if (session('user_tipo') === 1)
                <td><a href="{{ Route('compras.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                @else
                    <td>ITEM PAGO</td>
                @endif
                </td>
                @endforeach
            </tr>
            </tbody>
    </table>
</body>