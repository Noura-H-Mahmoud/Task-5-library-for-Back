<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
// use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    use ApiResponseTrait;
    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $alreadyFavorite = Favorite::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->exists();

        if ($alreadyFavorite) {
            return $this->apiResponse(null,'This book is already added to favorites',400);
        }
        Favorite::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
        ]);
        return $this->apiResponse(null,'Book added to favorites successfully',200);
    }
    public function remove(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);
        $favorite = Favorite::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->first();
        if ($favorite) {
            $favorite->delete();
            return $this->apiResponse(null, 'Book removed from favorites successfully', 200);
        }
        return $this->apiResponse(null, 'This book is not in your favorites list', 400);
    }
}
