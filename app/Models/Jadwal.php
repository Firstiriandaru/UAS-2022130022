<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $primaryKey = 'jadwal_id';

    protected $fillable = [
        'film_id',
        'studio_id',
        'tanggal_penayangan',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'film_id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'studio_id', 'studio_id');
    }
}
