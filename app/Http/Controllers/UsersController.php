<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();

        return view('users', ['users' => $users]);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users_edit', ['user' => $user]);
    }    
    

    public function update(Request $request, $id)
    {
        // Encontrar o usuário pelo ID
        $user = User::find($id);
        
        // Verificar se o usuário existe
        if (!$user) {
            return redirect()->back()->with('message', 'Usuário não encontrado');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);        
        
        // Atualizar os campos do usuário com os dados do formulário
        $user->name = $request->name; // Aqui use o nome do campo no formulário
    
        // Salvar as alterações no banco de dados
        $update = $user->save();
    
        // Verificar se a atualização foi bem-sucedida
        if ($update) {
            return redirect()->back()->with('message', 'Usuário atualizado com sucesso');
        } else {
            return redirect()->back()->with('message', 'Erro ao atualizar o usuário');
        }
    }
       
    

    public function destroy(string $id)
    {
        //
    }
}
