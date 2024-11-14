<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_headerid',
        'jadwal_id',
        'quantity',
    ];

    // Relationship with Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    // Access Film through Jadwal relationship
    public function film()
    {
        return $this->jadwal->belongsTo(Film::class, 'film_id');
    }

    // Access Studio through Jadwal relationship
    public function studio()
    {
        return $this->jadwal->belongsTo(Studio::class, 'studio_id');
    }
}
