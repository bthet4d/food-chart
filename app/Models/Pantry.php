<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PantryItem;
use App\Models\Family;


class Pantry extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pantries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'family_id'];

    /**
     * Get the family that owns the pantry.
     */
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    /**
     * Get the user that owns the pantry.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the pantry items for the pantry.
     */
    public function pantryItems() {
        return $this->hasMany(PantryItem::class);

    }
}