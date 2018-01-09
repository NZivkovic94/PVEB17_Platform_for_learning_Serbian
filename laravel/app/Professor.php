<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    public $timestamps=false;
    protected $primaryKey = 'id_professor';
    public $incrementing = false;

}
