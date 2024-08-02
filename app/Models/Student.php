<?php

namespace App\Models;

use App\Models\User;
use App\Models\Niveau;
use App\Models\Absence;
use App\Models\Presence;
use App\Models\StudentCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function absence()
    {
        return $this->hasMany(Absence::class);
    }

    public function studentCourse()
    {
        return $this->hasMany(StudentCourse::class);
    }
}
