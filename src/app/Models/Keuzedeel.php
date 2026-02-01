<?php


namespace App\Models;

use App\Models\BehaaldeKeuzedeel;

use Illuminate\Database\Eloquent\Model;

class Keuzedeel extends Model
{
    protected $table = 'keuzedelen';

    // Relatie: een keuzedeel kan door meerdere users behaald zijn
    public function behaaldeDoorUsers()
    {
        return $this->hasMany(BehaaldeKeuzedeel::class);
    }
}
