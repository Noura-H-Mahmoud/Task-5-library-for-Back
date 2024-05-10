<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RatingResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    use ApiResponseTrait;
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5', 
        ]);

        $alreadyRating = Rating::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->exists();

        if ($alreadyRating) {
            return $this->apiResponse(null,'You have already rated this book',400);
        }
        Rating::create($request->all());
        return $this->apiResponse(null,'Rating added successfully',200);
    }
    public function remove(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);
        $rating= Rating::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->first();
        if ($rating) {
            $rating->delete();
            return $this->apiResponse(null,'Rating removed successfully', 200);
        }
        return $this->apiResponse(null, 'Rating not found', 404);
    }
    public function index()
        {
            $ratings = Rating::all();
            return RatingResource::collection($ratings);
        }
    }
