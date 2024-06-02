<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Child;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'family_id',
        'role_id',
        'profile_photo',
        'gender',
        'height',
        'weight',
        'dob',
        'age',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Get the family associated with the user.
     */
    public function family()
    {
        return $this->belongsTo(Family::class)->with('pantries');
    }

    public function familyPantries () {
        return $this->family->pantries;
    }

    /**
     * The pantries that belong to the user.
     */
    public function userPantries()
    {
        return $this->belongsToMany(Pantry::class);
    }

    public function toyChests()
    {

        // If the user is a child, return their toy chests
        if ($this->role_id === env('CHILD_ROLE_ID')) {
            return $this->hasMany(ToyChest::class, 'user_id');
        }

        return $this->hasManyThrough(
            ToyChest::class,
            User::class, // Intermediate model (Child)
            'family_id', // Foreign key on the intermediate model
            'user_id', // Foreign key on the far model
            'family_id', // Local key on the parent model
            'id' // Local key on the intermediate model
        )->with('prize');
    }

    /**
     * Scope a query to only include users with the 'child' role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChild($query)
    {
        return $query->where('role_id', Role::where('id', env('CHILD_ROLE_ID'))->first()->id);
    }
    /**
     * Scope a query to only include users with the 'parent' role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeParent($query)
    {
        return $query->where('role_id', Role::where('id', env('PARENT_ROLE_ID'))->first()->id);
    }
    /**
     * Get the children of the user.
     *
     */
    public function children()
    {
        return $this->hasMany(User::class, 'family_id', 'family_id')->where('role_id', env('CHILD_ROLE_ID'));
    }

    /**
     * Get the parent of the user.
     *
     */
    public function parent()

    {
        return $this->belongsTo(User::class, 'family_id')->parent();
    }

    /**
     * Get the role associated with the user.
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if the user is a parent.
     */
    public function isParent() {
        return $this->role->name === 'parent';
    }

    /**
     * Check if the user is a child.
     */
    public function isChild() {
        return $this->role->name === 'child';
    }
}
