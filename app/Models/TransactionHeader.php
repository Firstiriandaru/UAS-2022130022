<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'TransactionHeaderid');
    }
}
