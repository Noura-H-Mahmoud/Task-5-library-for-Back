<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 
        'author',
        'category_id',
    ];
    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'favorites');
    }
    public function userratings()
{
    return $this->belongsToMany(User::class,'ratings');
}

}
