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
        return view('users_create');
    }


    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
    
        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
        ]);
    
        // Verifica se o usuário foi criado com sucesso
        if ($user) {
            return redirect()->back()->with('message', 'Usuário criado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao criar usuário');
        }
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
    
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);
    
        // Atualizar o nome do usuário
        $user->name = $request->nome; // Aqui use o nome do campo no formulário
    
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
