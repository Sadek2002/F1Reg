<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    use HasFactory;

    /**
     * Define the relationships in the RaceResult model.
     */

    // Assuming RaceResult belongs to a User

    public function race()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }
}
