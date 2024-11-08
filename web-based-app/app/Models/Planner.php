<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    //
    protected $table = 'planner';
    protected $fillable = ['title', 'description', 'planner_date', 'user_id'];
    protected $casts = [
        'planner_date' => 'datetime',
    ];
}
