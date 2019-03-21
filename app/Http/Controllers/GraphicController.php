<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;
use App\User;

class GraphicController extends Controller
{
    public function show()
    {
        //Pegando a quantidade de usuarios por idades (maiores e menores de idade) 
        $countUserMoreAge = User::where('age', '>=', 18)->count();
        $countUserLessAge = User::where('age', '<', 18)->count();

        if ($countUserLessAge || $countUserMoreAge > 0) {
            //Instacio a classe LavaCharts 
            $lava = new Lavacharts;

            //dataTable é um objeto utilizado para visualizar e configurar o gráfico
            $usersAge = $lava->dataTable();

            //Adicionando linhas para o gráfico, há apenas duas para, os maiores de idade e menores de idade
            $usersAge->addStringColumn('Age')
                ->addNumberColumn('Age')
                ->addRow(['Menores de 18 ', $countUserLessAge])
                ->addRow(['Maiores de 18 ', $countUserMoreAge]);
            //DonutChart um estilo de gráficos, mas há outros tipos e eu troco aqui, além de configurar título entre outros
            $lava->DonutChart(
                'Age',
                $usersAge,
                ['title' => 'Idade dos usuários:']
            );
            return view('graphic', ['lava' => $lava]);
        } else {
            $lava = false;
            return view('graphic', ['lava' => $lava]);
        }
    }
}
