<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show()
    {
        $users = User::all(['*']);
        return view('users', ['users' => $users]);
    }

    public function create(Request $request)
    {
        User::updateOrCreate(
            [
                'id' => $request['id']
            ],
            [
                'firstname' => $request['name'],
                'email' => $request['email'],
                'age' => $request['age']
            ]
        );
        if ($request['id'] != null) {
            return redirect('/')->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect('/')->with('success', 'Criado com sucesso!');
        }
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect('/')->with('warning', 'Deletado com sucesso!');
    }

    public function update($id)
    {
        $user = User::find($id);
        return view('users', ['user' => $user]);
    }
}
