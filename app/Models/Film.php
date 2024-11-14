<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $primaryKey = 'film_id';

    protected $fillable = [
        'judulfilm',
        'genre',
        'durasi',
        'rating',
        'tanggal_rilis',
        'tanggal_selesai',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'film_id', 'film_id');
    }
}
