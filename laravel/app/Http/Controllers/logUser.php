<?php
namespace App\Http\Controllers;
use App\Administrator;
use App\Secret;
use App\Professor;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class logUser extends Controller
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
    public function store(Request $request)
    {
        //
    }
    /**
     *  Takes email and password from Vue.js and sends it to Auth route
     *  Also takes the secret from database
     */
    public function signIn(Request $request)
    {
        $secrets = Secret::where('id', 2)->get(['secret']);
        $object =
            [
                'client_id' => 2,
                'client_secret' => $secrets[0] -> secret,
                'grant_type' => 'password',
                'username' => $request->get('username'),
                'password' => $request->get('password')
            ];
            //
        //  http://docs.guzzlephp.org/en/stable/
        //  http://docs.guzzlephp.org/en/stable/quickstart.html  !!!!!!!!!!
        
        $client = new Client();
        $response = $client->request('POST', 'http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/oauth/token', [
            'json' => $object
        ]);


        return $response;
    }

    public function isAdmin(Request $request)
    {
        if(Administrator::where('id_administrator', $request->get('id_administrator'))->count() )
            return "true";
        else
            return "false";
    }

    public function isProfessor(Request $request)
    {
        if(Professor::where('id_professor', $request->get('id_professor'))->count() )
            return "true";
        else
            return "false";
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}