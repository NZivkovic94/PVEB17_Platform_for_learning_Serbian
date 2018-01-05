<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class addUser extends Controller
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

        //with $request->all() we take only attributes from $fillable array form model User.php
        //if we add more attributes to form we get get them from $request array with get()
        //['city'=>$request->get('city'), 'timezone'=>$request->get('timezone')]
        //or just add them all to $fillabe

        //User::create($request->all()); we cant use this becasue we cant store raw password

        $pass = Hash::make($request->get('password'));

        User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => $pass,
            'email' => $request->get('email'),
            'username' => $request->get('username')
        ]);


        //here we should redirect back to /signin and add more users
        //if laravel and vue.js routes work by default

        return 'We added new user to database';
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
