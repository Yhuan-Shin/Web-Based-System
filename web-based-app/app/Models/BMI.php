<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    //
    protected $table = 'bmi';
    protected $fillable = ['name', 'height', 'weight', 'bmi', 'result', 'student_id'];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
