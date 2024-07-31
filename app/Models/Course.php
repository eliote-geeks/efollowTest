<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Session;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function niveau()
    {
        return $this->hasMany(Niveau::class);
    }

    public function session()
    {
        return $this->hasMany(Session::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
}
