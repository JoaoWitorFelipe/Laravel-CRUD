<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Api;

class ApiController extends Controller
{
    public function show()
    {
        $repos = Api::all(['*']);
        return view('api', ['repos' => $repos]);
    }

    public function repos(Request $request)
    {
        $curl = curl_init();

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

        $response = curl_exec($curl);
        curl_close($curl);

        try {
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
            print($e->getMessage());
        }
    }

    public function delete($id)
    {
        Api::destroy($id);

        return redirect('/api')->with('warning', 'Deletado com sucesso!');
    }
}
