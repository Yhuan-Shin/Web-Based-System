<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    //
    protected $table = 'reminder';
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];
}
