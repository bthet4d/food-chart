<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function pantries () {
        return $this->hasMany(Pantry::class);
    }
    
    public function parents() {
        return $this->hasMany(User::class);
    }

    public function children() {
        return $this->hasMany(User::class)->where('role', 'child');
    }

    public function toyChests() {
        return $this->hasManyThrough(
            ToyChest::class,
            User::class,
            'family_id', // Foreign key on the users table...
            'user_id', // Foreign key on the toy chests table...
            'id', // Local key on the families table...
            'id' // Local key on the users table...
        )->where('role_id', 2); // Only consider users with role_id 2 (children)
    }

    public function prizes() {
        return $this->hasManyThrough(Prize::class, ToyChest::class);
    }
}
