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
        return redirect('/');
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect('/');
    }

    public function update($id)
    {
        $user = User::find($id);
        return view('users', ['user' => $user]);
    }
}
