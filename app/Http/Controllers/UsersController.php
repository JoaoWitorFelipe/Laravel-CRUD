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
        User::create([
            'firstname' => $request['name'],
            'email' => $request['email'],
            'age' => $request['age']
        ]);
        return redirect('/');
    }
}
