<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodEntry;
use App\Models\SubCategory;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'calories',
        'protein',
        'carbohydrates',
        'fat',
        'serving_size',
        'sub_category_id',
        'icon_url',
        'image_url'
    ];

    /**
     * Get the category that the food belongs to.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get the food entries for the food.
     */
    public function foodEntries()
    {
        return $this->hasMany(FoodEntry::class);
    }
}