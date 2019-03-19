<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Api;

class ApiController extends Controller
{
    public function show()
    {
        //Renderizo a página com os repositórios cadastrados.
        $repos = Api::all(['*']);
        return view('api', ['repos' => $repos]);
    }

    public function repos(Request $request)
    {
        //Busco um repositório utilizando uma URL (API do GitHub que retorna um valor JSON).
        //Inicio o CURL para utilizar as suas funcionalidades.
        $curl = curl_init();
        //Configurações do CURL.
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.github.com/repos/' . $request['repos'],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ]);
        
        //Recebo o objeto em JSON.
        $response = curl_exec($curl);
        //Fecho a conexão com o CURL.
        curl_close($curl);

        try {
            //Pego todas a informações do objeto JSON utilizando o json_decode.
            $response = json_decode($response);

            Api::create(
                [
                    'name' => $response->name,
                    'avatar_url' => $response->owner->avatar_url,
                    'description' => $response->description,
                    'html_url' => $response->html_url
                ]
            );

            return redirect('/api')->with('success', 'Encontrado repositório!');
        } catch (\Exception $e) {
            //Caso de erro, exibir a mensagem em tela.
            print($e->getMessage());
        }
    }

    public function delete($id)
    {
        //Deletar repositório.
        Api::destroy($id);

        return redirect('/api')->with('warning', 'Deletado com sucesso!');
    }
}
