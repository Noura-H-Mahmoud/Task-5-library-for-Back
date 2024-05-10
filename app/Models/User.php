<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }  
    // for book favorite
    public function books()
    {
        return $this->belongsToMany(Book::class,'favorites');
    }
    // for book rating
    public function bookratings()
    {
        return $this->belongsToMany(Book::class,'ratings');
    }
    // for user role
    protected static function booted()
    {
        static::created(function ($user) {
            if (!Role::where('name', 'User')->exists()) {
                Role::create(['name' => 'User']);
            }
            $user->assignRole('User');
            $permissions = ['book-list', 'category-list', 'root-list'];
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
                $user->givePermissionTo($permission);
            }
        });
    }
}
