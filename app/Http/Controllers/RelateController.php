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
        $users = User::all(['*']);
        $repos = Api::all(['*']);

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
        Relate::create(
            [
                'id_user' => $request['id_user'],
                'id_repos' => $request['id_repos']
            ]
        );

        return redirect('/relate');
    }

    public function delete($id_user, $id_repos)
    {
        Relate::where('id_user', '=', $id_user)
            ->where('id_repos', '=', $id_repos)
            ->delete();

        return redirect('/relate');
    }
}
