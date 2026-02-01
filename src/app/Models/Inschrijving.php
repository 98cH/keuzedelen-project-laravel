<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'inschrijvingen';
    protected $fillable = [
        'user_id',
        'keuzedeel_1_id',
        'keuzedeel_2_id',
        'keuzedeel_3_id',
        'toegewezen_keuzedeel_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keuzedeel1()
    {
        return $this->belongsTo(Keuzedeel::class, 'keuzedeel_1_id');
    }
    public function keuzedeel2()
    {
        return $this->belongsTo(Keuzedeel::class, 'keuzedeel_2_id');
    }
    public function keuzedeel3()
    {
        return $this->belongsTo(Keuzedeel::class, 'keuzedeel_3_id');
    }
    public function toegewezenKeuzedeel()
    {
        return $this->belongsTo(Keuzedeel::class, 'toegewezen_keuzedeel_id');
    }
}
