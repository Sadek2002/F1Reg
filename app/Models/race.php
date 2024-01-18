<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class race extends Model
{/**
 * We define our relationships here.
 * A race can have many Results, so we give it a belongsToMany relationship with the results table.
 * See the comment in database->migration-> Create_race_result_table for more detail about the relationships.
 */
    use HasFactory;
    public function results()
    {
        return $this->belongsToMany(Result::class, 'race_results');
    }
}
