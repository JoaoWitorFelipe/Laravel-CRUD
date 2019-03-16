<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relate extends Model
{
    protected $fillable = 
    [
        'id_user', 'id_repos'
    ];

    protected $table = 'register_user_repos';

    public $timestamps = false;
}
