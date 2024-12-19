<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    //
    protected $table = 'bmi';
    protected $fillable = ['st_last_name', 'st_first_name', 'st_middle_name', 'height', 'weight', 'bmi', 'result', 'student_id'];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
