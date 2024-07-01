<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'nomeCadastrar' => 'required',
            'sobrenomeCadastrar' => 'required',
            'emailCadastrar' => 'required|email',
            'senhaCadastrar' => 'required',
        ])->validate();

        if (User::where('email', $request->emailCadastrar)->exists()) {
            return redirect()->back()->withInput()->withErrors(['emailCadastrar' => 'Este e-mail já está sendo utilizado.']);
        }

        User::create([
            'name' => $request->nomeCadastrar,
            'sobrenome' => $request->sobrenomeCadastrar,
            'email' => $request->emailCadastrar,
            'password' => Hash::make($request->senhaCadastrar),
            'tipo' => false
        ]);

        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function logar(Request $request)
    {  
        $dados = $request->only('email', 'password');
        if (Auth::attempt($dados)) {
            $user = Auth::user(); 
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_sobrenome' => $user->sobrenome,
                'user_tipo' => $user->tipo,
            ]);
            $user = Auth::user();
            return redirect()->route('index'); 
        } else {
            return back()->withErrors([
                'email' => 'Credenciais inválidas.',
            ]);
        }
    }

    public function usuarios()
    {
        $usuarios = DB::table('users')->get();
        return view('usuarios', ['usuarios'=>$usuarios]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public static function usuario($id)
    {
        $usuario = DB::table('users')
        ->where('id', $id)
        ->first();

        return $usuario;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'tipo' => 'required|boolean'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('index')->with('success', 'Usuário excluído com sucesso.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}    
