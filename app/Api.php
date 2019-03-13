<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $fillable =
    [
        'name', 'avatar_url', 'description', 'html_url'
    ];

    public $timestamps = false;

    protected $table = "register_repos";
}
