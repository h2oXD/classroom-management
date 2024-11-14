<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'teacher_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }
    public function classrooms()
{
    return $this->belongsToMany(Classroom::class, 'classroom_subject', 'teacher_id', 'classroom_id');
}
}
