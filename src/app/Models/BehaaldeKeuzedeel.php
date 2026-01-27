<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehaaldeKeuzedeel extends Model
{
    use HasFactory;

    protected $table = 'behaalde_keuzedelen';

    protected $fillable = [
        'user_id',
        'keuzedeel_id',
        'behaald_op',
    ];

    // Relaties
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keuzedeel()
    {
        return $this->belongsTo(Keuzedeel::class);
    }
}
