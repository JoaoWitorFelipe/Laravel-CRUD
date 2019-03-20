<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show()
    {
        //Renderizar a raíz do site passando todos os usuários para exibir.
        $users = User::all(['*']);
        return view('users', ['users' => $users]);
    }

    public function create(Request $request)
    {
        //Verificar se o usuário já tem conta, se sim, atualizar senão, criar uma conta. 
        User::updateOrCreate(
            [
                //Verificação por ID, se já existe no banco de dados.
                'id' => $request['id']
            ],
            [
                //Atualizar ou criar uma conta com essas informações.
                'firstname' => $request['name'],
                'email' => $request['email'],
                'age' => $request['age']
            ]
        );
        //Exibir a mensagem de acordo com a ação do usuário (criar ou atualizar).
        if ($request['id'] != null) {
            return redirect('/')->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect('/')->with('success', 'Criado com sucesso!');
        }
    }

    public function delete($id)
    {
        try {
            //Excluir um usuário por ID.
            User::destroy($id);

            return redirect('/')->with('warning', 'Deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/')->with('info', 'Oops! Parece que esse usuário tem um cadsatro com algum repositório!');
        }
    }

    public function update($id)
    {
        //Renderiza a raíz do site passando os valores do usuário que quer atualizar a conta.
        $user = User::find($id);
        return view('users', ['user' => $user]);
    }
}
