<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chart;
use App\Models\Child;

class Prize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'points_required',
        'image_url',
        'purchase_url',
    ];

    /**
     * Get the charts that have the prize.
     */
    public function charts() {
        return $this->hasMany(Chart::class);
    }

    /**
     * Get the children that have the prize in their wishlist.
     */
    public function children() {
        return $this->belongsToMany(Child::class, 'wishlists');
    }

    public function toyChests() {
        return $this->hasMany(ToyChest::class);
    }

    public function whishlists() {
        return $this->hasMany(Wishlist::class);
    }
}