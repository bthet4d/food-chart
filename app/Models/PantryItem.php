<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;
use App\Models\Pantry;

class PantryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'pantry_id',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function pantry()
    {
        return $this->belongsTo(Pantry::class);
    }
}
