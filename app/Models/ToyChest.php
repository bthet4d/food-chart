<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToyChest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function child() {
        return $this->belongsTo(User::class);
    }

    public function prize() {
        return $this->belongsTo(Prize::class);
    }
}
