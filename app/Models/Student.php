<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'student_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'enrollments', 'student_id', 'classroom_id')
            ->withPivot('enrollment_date', 'status');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
