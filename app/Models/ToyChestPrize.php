<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToyChestPrize extends Model
{
    use HasFactory;

    protected $fillable = ['toy_chest_id', 'prize_id', 'claimed_at'];

    public function toyChest() {
        return $this->belongsTo(ToyChest::class);
    }

    public function prize() {
        return $this->belongsTo(Prize::class);
    }
}
