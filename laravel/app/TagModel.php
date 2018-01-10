<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    protected $table = 'tag';
    public $timestamps=false;
    protected $primaryKey = 'id_tag';
    public $incrementing = false;      // uncomment if it its not autoincrementing


    protected $fillable = [
        'id_tag', 'tag_content'
    ];
}