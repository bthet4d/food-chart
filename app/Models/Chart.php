<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodEntry;
use App\Models\Prize;
use App\Models\User;
use App\Models\Child;

class Chart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'completed_at',
        'prize_id',
        'grid_columns',
        'grid_rows',
    ];

    /**
     * Get the child that owns the chart.
     */
    public function child()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the prize associated with the chart.
     */
    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    /**
     * Get the food entries for the chart.
     */
    public function foodEntries()
    {
        return $this->hasMany(FoodEntry::class);
    }
}