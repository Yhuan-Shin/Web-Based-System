<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';
    protected $fillable = ['student_name', 'birthday', 'student_no', 'age', 'gender', 'user_id', 'grade', 'section','user_id'];
    public function bmi(): HasOne
    {
        return $this->hasOne(BMI::class, 'student_id'); // Assuming 'student_id' is the foreign key in the Bmi table
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function dietaryAndActivities(): HasOne
    {
        return $this->hasOne(DietaryAndActivities::class, 'student_id');
    }

}
