<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Secret extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'oauth_clients';
    public $timestamps=false;
}
