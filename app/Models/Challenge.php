<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'food_id', 'chart_id', 'points', 'completed', 'is_double'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

    public function toggleDouble()
    {
        $this->is_double = !$this->is_double;
        $this->save();
    }
}
