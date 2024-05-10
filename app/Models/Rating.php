<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'book_id', 
        'rating',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function userrating()
    {
        return $this->belongsTo(User::class);
    }

    public function bookrating()
    {
        return $this->belongsTo(Book::class);
    }
}
