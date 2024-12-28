<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory;

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
