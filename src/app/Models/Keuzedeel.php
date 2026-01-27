<?php


namespace App\Models;

use App\Models\BehaaldeKeuzedeel;

use Illuminate\Database\Eloquent\Model;

class Keuzedeel extends Model
{
    // Relatie: een keuzedeel kan door meerdere users behaald zijn
    public function behaaldeKeuzedelen()
    {
        return $this->hasMany(BehaaldeKeuzedeel::class);
    }
    protected $table = 'keuzedelen';
}
