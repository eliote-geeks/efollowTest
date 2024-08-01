<?php

namespace App\Models;


use App\Models\Course;
use App\Models\Absence;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function absence()
    {
        return $this->hasMany(Absence::class);
    }
}
