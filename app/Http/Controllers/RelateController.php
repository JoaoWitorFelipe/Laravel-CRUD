<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Api;
use App\Relate;
use Illuminate\Support\Facades\DB;

class RelateController extends Controller
{
    public function show()
    {
        //Exibo os usuários e repositórios cadastrados para fazer a relação.
        $users = User::all(['*']);
        $repos = Api::all(['*']);
        //Pegar as relações cadastradas com chaves estrangeiras.
        $relates = DB::table('register_user_repos')
            ->join('register_user', 'register_user_repos.id_user', '=', 'register_user.id')
            ->join('register_repos', 'register_user_repos.id_repos', '=', 'register_repos.id')
            ->select('id_user', 'id_repos', 'firstname', 'name')
            ->get();
        // var_dump($relates);
        return view('relate', ['users' => $users, 'repos' => $repos, 'relates' => $relates]);
    }

    public function create(Request $request)
    {
        //Cria a relação.
        Relate::create(
            [
                'id_user' => $request['id_user'],
                'id_repos' => $request['id_repos']
            ]
        );

        return redirect('/relate')->with('success', 'Relação criada com sucesso!');
    }

    public function delete($id_user, $id_repos)
    {
        //Deleta a relação caso os dois IDs sejam as mesmas que estão cadastradas.
        Relate::where('id_user', '=', $id_user)
            ->where('id_repos', '=', $id_repos)
            ->delete();

        return redirect('/relate')->with('warning', 'Relação deletada com sucesso!');
    }
}
