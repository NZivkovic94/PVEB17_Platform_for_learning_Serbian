<?php

namespace App\Http\Controllers;

use App\LessonModel;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Integer;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class workWithLesson extends checkRole
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        LessonModel::create([
            'id_author' => $id,
            'video_url' => $request->get('video_url')
        ]);

        return "We added new lesson";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // Adding lesson as Admin
    public function createAsAdmin(Request $request)
    {
        $pom = $this->checkRole($request, "administrator");

        if($pom[0] == "true") {
            workWithLesson::store($request, $pom[1]);
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }

    // Adding lesson as Professor
    public function createAsProfessor(Request $request)
    {
        $pom = $this->checkRole($request, "professor");

        if($pom[0] == "true") {
            workWithLesson::store($request, $pom[1]);
        }
        else {
            return response()->json([
                'isProfessor' => "Nisi profa"
            ]);
        }
    }

    public function destroyAsAdmin(Request $request)
    {
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

        $idObject = [
            'id_administrator' => $id_user_int,
        ];

        $clientRole = new Client();
        $what_role_this_user_has = $clientRole->request('POST', 'http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/isAdmin', [
            'json' => $idObject
        ]);

        $role_bool_body = $what_role_this_user_has->getBody();
        $string_role_bool_body = (string) $role_bool_body;

        if( $string_role_bool_body == "true") {
            /*
             * Here we delete lesson if we are admin and we return response to Vue.js so
             * user will know if lesson is deleted
             */
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }

    public function destroyAsProfessor(Request $request)
    {
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

        $idObject = [
            'id_professor' => $id_user_int,
        ];

        $clientRole = new Client();
        $what_role_this_user_has = $clientRole->request('POST', 'http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/isProfessor', [
            'json' => $idObject
        ]);

        $role_bool_body = $what_role_this_user_has->getBody();
        $string_role_bool_body = (string) $role_bool_body;

        if( $string_role_bool_body == "true") {
            /*
            * Here we delete lesson if we are professor and we return response to Vue.js so
            * user will know if lesson is deleted
            */
        }
        else {
            return response()->json([
                'isProfessor' => "Nisi profa"
            ]);
        }
    }
}
