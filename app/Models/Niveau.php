<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory;
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
