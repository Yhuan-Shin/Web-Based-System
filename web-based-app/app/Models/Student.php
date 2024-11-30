<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';
    protected $fillable = ['name', 'birthday', 'student_no', 'age', 'gender', 'user_id'];
    public function bmi(): HasOne
    {
        return $this->hasOne(Bmi::class, 'student_id'); // Assuming 'student_id' is the foreign key in the Bmi table
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
