@include('header.header')

<div class="container">
    <h2>Editar Compra</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('compras.update', $compras->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-top: 10px" class="form-group">
            <label for="tipo">Status: </label>
            <select name="tipo" id="tipo">
                @if (session('user_tipo') === 1)
                <option value="0">PENDENTE</option>
                <option value="1">PAGO</option> 
                @endif
                <option value="2">CANCELAR</option>
            </select>
        </div>

        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
