<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
    protected $table = 'post_story';
    protected $fillable = ['description', 'image'];
}
