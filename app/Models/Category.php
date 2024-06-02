<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the foods for the category.
     */
    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    /**
     * Get the subcategories for the category.
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}