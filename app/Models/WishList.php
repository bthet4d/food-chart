<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Child;
use App\Models\Prize;

class Wishlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'child_id',
        'prize_id',
        'is_approved',
    ];

    /**
     * Get the child associated with the wishlist.
     */
    public function child() {
        return $this->belongsTo(Child::class);
    }

    /**
     * Get the prize associated with the wishlist.
     */
    public function prize() {
        return $this->belongsTo(Prize::class);
    }
}