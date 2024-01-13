<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;
    /**
     * We define our relationships that the result table has in here.
     * A result belongs to 1 user, so we use a belongsTO.
     * And a result can be part of many Races, so we use a belongsToMany.
     * See the comment in database->migration-> Create_race_result_table for more detail about the relationships.
     */

    protected $fillable = ['user_id', 'laptime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function races()
    {
        return $this->belongsToMany(Race::class);
    }
}
