<?php


namespace App\Models;

use App\Models\BehaaldeKeuzedeel;

use Illuminate\Database\Eloquent\Model;

class Keuzedeel extends Model
{
    protected $table = 'keuzedelen';

    protected $fillable = [
        'titel',
        'keuzedeelcode',
        'beschrijving',
        'max_inschrijvingen',
        'actief',
        'periode_id',
        'opleiding_id',
    ];

    // Relatie: een keuzedeel kan door meerdere users behaald zijn
    public function behaaldeDoorUsers()
    {
        return $this->hasMany(BehaaldeKeuzedeel::class);
    }

    public function opleiding()
    {
        return $this->belongsTo(Opleiding::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
