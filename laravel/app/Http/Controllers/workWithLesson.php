<?php

namespace App\Http\Controllers;

use App\LessonHasTag;
use App\LessonModel;
use App\Http\Controllers\Controller;
use App\TagModel;
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
    public function store(Request $request, $id, $user)
    {
        //add lesson
        LessonModel::create([
            'id_author' => $id,
            'video_url' => $request->get('video_url'),
            'title' => $request->get('title'),
            'description_lesson' => $request->get('description_lesson')
        ]);
        //get id_lesson from above insert into Lesson
        $query_id_lesson = LessonModel::where('id_author', $id)
                                     ->where('video_url', $request->get('video_url'))
                                     ->where('title', $request->get('title'))
                                     ->where('description_lesson', $request->get('description_lesson'))
                                     ->value('id_lesson');

        $id_role = "";
        if($user == "professor")
            $id_role = "id_professor";
        else if($user == "administrator")
            $id_role = "id_administrator";

        //store every tag with same lesson and id_author into table lesson_has_tag
        foreach ($request->get('selectedTags') as $id_tag)
        {
            LessonHasTag::create([
                'id_lesson' => $query_id_lesson,
                'id_tag' => $id_tag,
                $id_role => $id
            ]);
        }

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

    public function showByTag(Request $request){

        $lesson_ids = LessonHasTag::where("id_tag", $request->get("id_tag"))->get();
        $lessons_with_tag_ids_array = [];

        foreach ($lesson_ids as $lesson_id)
            array_push($lessons_with_tag_ids_array, $lesson_id["id_lesson"]);

        $lessons = [];

        foreach ($lessons_with_tag_ids_array as $lessons_with_tag_id)
            array_push($lessons, LessonModel::find($lessons_with_tag_id));

        $lessons_name = [];

        foreach ($lessons as $lesson) {
            $tags_array = [];
            $id_lesson = intval($lesson['id_lesson']);
            $tags = LessonHasTag::where('id_lesson', $id_lesson)->get();
            foreach ($tags as $tag)
                array_push($tags_array, $tag["id_tag"]);
            $lesson["tags_array"] = $tags_array;
            array_push($lessons_name, $lesson);
        }

        $json_response = json_encode($lessons_name);
        return response($json_response);
    }

    public function showAll(){
        $lessons = LessonModel::all();
        $lessons_name = [];


        foreach ($lessons as $lesson) {
            $tags_array = [];

            $id_lesson = intval($lesson['id_lesson']);
            $tags = LessonHasTag::where('id_lesson', $id_lesson)->get();
            foreach ($tags as $tag)
                array_push($tags_array, $tag["id_tag"]);
            $lesson["tags_array"] = $tags_array;
            array_push($lessons_name, $lesson);
            }


        $json_response = json_encode($lessons_name);
        return response($json_response);

    }


    public function destroy(Request $request)
    {
        $lesson = LessonModel::find($request->get('id_lesson'));
        $lesson->delete();

    }


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
            workWithLesson::store($request, $pom[1], "administrator");
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
            workWithLesson::store($request, $pom[1], "professor");
        }
        else {
            return response()->json([
                'isProfessor' => "Nisi profa"
            ]);
        }
    }

    public function destroyAsAdmin(Request $request)
    {
        $pom = $this->checkRole($request, "administrator");

        if($pom[0] == "true") {
            workWithLesson::destroy($request, $pom[1], "administrator");
        }
        else {
            return response()->json([
                'isAdmin' => "Nisi admin"
            ]);
        }


    }

    public function destroyAsProfessor(Request $request)
    {
        $pom = $this->checkRole($request, "professor");

        if($pom[0] == "true") {
            workWithLesson::destroy($request, $pom[1], "professor");
        }
        else {
            return response()->json([
                'isProfessor' => "Nisi profa"
            ]);
        }
    }
}
