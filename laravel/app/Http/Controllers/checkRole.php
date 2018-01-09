<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class checkRole extends Controller
{
    public function checkRole(Request $request, $role)
    {
        $route = "http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/";
        $id_role = "";


        $clientUser = new Client();
        $which_user_is_this = $clientUser->request('GET', 'http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/user', [
            'headers' => [
                'Authorization' => $request->header('Authorization')
            ]
        ]);

        $response_body = $which_user_is_this->getBody();
        $string_response_body = (string) $response_body;
        $response_array = explode(",", $string_response_body);
        $id_user_array = explode(":", $response_array[0]);
        $id_user_int = intval($id_user_array[1]);



        if($role == "administrator") {
            $id_role = "id_administrator";
            $route .= "isAdmin";
        }
        else if ($role == "professor") {
            $id_role = "id_professor";
            $route .= "isProfessor";
        }

        $idObject = [
            $id_role => $id_user_int,
        ];

        $clientRole = new Client();
        $what_role_this_user_has = $clientRole->request('POST', $route, [
            'json' => $idObject
        ]);

        $role_bool_body = $what_role_this_user_has->getBody();
        $string_role_bool_body = (string) $role_bool_body;

        return [$string_role_bool_body, $id_user_int];
    }

}
