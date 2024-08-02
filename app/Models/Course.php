<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Sesion;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\StudentCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;


    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function studentCourse()
    {
        return $this->hasMany(StudentCourse::class);
    }
}
