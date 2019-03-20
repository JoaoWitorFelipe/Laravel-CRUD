<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;
use App\User;

class GraphicController extends Controller
{
    public function show()
    {

        $lava = new Lavacharts;

        $usersAge = $lava->dataTable();

        $countUserMoreAge = User::where('age', '>=', 18)->count();
        $countUserLessAge = User::where('age', '<', 18)->count();

        $usersAge->addStringColumn('Age')
            ->addNumberColumn('Age')
            ->addRow(['Less 18: ', $countUserLessAge])
            ->addRow(['More 18: ', $countUserMoreAge]);

        $lava->DonutChart(
            'Age',
            $usersAge,
            ['title' => 'Age Of People']
        );

        return view('graphic', ['lava' => $lava]);
    }
}
