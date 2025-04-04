<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use SoftDeletes;
    //
    protected $table = 'student';
    protected $fillable = ['st_last_name', 'st_first_name', 'st_middle_name', 'birthday', 'student_no', 'age', 'gender', 'grade', 'section','profile_pic', 'user_id','allergies','health_conditions','religion'];
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
    public function teacher()
    {
        return $this->hasOne(User::class, 'section', 'section')->where('role', 'teacher');
    }




}
