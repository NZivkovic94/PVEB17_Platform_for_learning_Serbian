<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Secret extends Model
{
    use  Notifiable;

    protected $table = 'oauth_clients';
    public $timestamps=false;
}
