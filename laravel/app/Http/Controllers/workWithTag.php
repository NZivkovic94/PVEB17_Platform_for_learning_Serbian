<?php

namespace App\Http\Controllers;

use App\TagModel;
use App\LessonHasTag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class workWithTag extends checkRole
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

        TagModel::create([
            'id_tag' => $request->get('id_tag')
        ]);

        return "We added new tag";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tags = TagModel::all();
        $tags_array = [];

        foreach ($tags as $tag) {
             array_push($tags_array, $tag->id_tag);
        }

        $json = json_encode($tags_array);

        return response($json);

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
    public function destroy(Request $request)
    {
        $tag = TagModel::find($request->get('id_tag'));
        $tag->delete();

    }

    //add new tag as Admin
    public function createAsAdmin(Request $request)
    {
        $pom = $this->checkRole($request, "administrator");

        if($pom[0] == "true") {
            workWithTag::store($request);
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }

    public function showAsAdmin(Request $request)
    {
        $pom = $this->checkRole($request, "administrator");

        if($pom[0] == "true") {
            return workWithTag::show();
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }

    public function showAsProfessor(Request $request)
    {
        $pom = $this->checkRole($request, "professor");

        if($pom[0] == "true") {
            return workWithTag::show();
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }

    //delete tag as Admin
    public function destroyAsAdmin(Request $request)
    {
        $pom = $this->checkRole($request, "administrator");

        if($pom[0] == "true") {
            workWithTag::destroy($request);
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }
    }
}
