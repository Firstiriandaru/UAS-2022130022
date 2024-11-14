<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studios';

    protected $primaryKey = 'studio_id';

    protected $fillable = [
        'studio_name',
        'kapasitas',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'studio_id', 'studio_id');
    }
}
