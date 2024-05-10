<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function root()
    {
        return $this->BelongsTo(Root::class);
    }
}

