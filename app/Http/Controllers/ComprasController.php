<?php

namespace App\Http\Controllers;
use App\Models\Compras;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function inserirCompra($usuario, $idProduto)
    {  
        $dados = Compras::create([
            'user'=>  $usuario,
            'produto' => $idProduto,
            'status'=> 0
        ]);

        return redirect()->route('itens')->with('success', 'Usuário cadastrado com sucesso!');
    
    }

    public function todasCompras()
    {   
        $compras = DB::table('compras')
        ->get();
        return view('compras', ['compras'=> $compras]);
    }

    public function edit($id)
    {
        $compras = Compras::findOrFail($id);
        return view('edit_compras', compact('compras'));
    }

    public function update(Request $request, $id)
    {
        $compra = Compras::findOrFail($id);
        $compra->status = $request->tipo;
        $compra->save();

        return redirect()->route('compras');
    }

    public function minhasCompras($id)
    {
        $compras = DB::table('compras')
        ->where('status', '!=', 2)
        ->get()
        ->where('user', $id);
        
        return view('compras', compact('compras'));
    }
}
