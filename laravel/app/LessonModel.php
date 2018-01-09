<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    public $timestamps=false;
    protected $primaryKey = 'id_lesson';
    //public $incrementing = false;       uncomment if it its not autoincrementing

}
