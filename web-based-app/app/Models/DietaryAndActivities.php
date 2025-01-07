<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietaryAndActivities extends Model
{
    //
    protected $table = 'dietary_and_activities';
    protected $fillable = ['student_id', 'dietary', 'activities', 'image'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
