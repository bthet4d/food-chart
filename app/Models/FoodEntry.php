<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_id',
        'food_id',
        'date_tried',
        'comments',
        'point_value',
        'video_url',
        'star_rating',
    ];

    /**
     * Get the chart that owns the food entry.
     */
    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    /**
     * Get the food associated with the food entry.
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}