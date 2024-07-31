<?php

namespace App\Models;

use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory;
    public function specialty()
    {
        return $this->belongsTo(Specialite::class);
    }
}
