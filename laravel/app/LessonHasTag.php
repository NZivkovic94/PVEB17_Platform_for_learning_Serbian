<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonHasTag extends Model
{
    protected $table = 'lesson_has_tag';
    public $timestamps=false;
    protected $primaryKey = ['id_tag', 'id_lesson'];
    public $incrementing = false;

    protected $fillable = [
        'id_tag', 'id_lesson', 'id_professor', 'id_administrator'
    ];

}
