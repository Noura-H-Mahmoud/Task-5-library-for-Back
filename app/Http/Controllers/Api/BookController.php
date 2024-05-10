<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\PostResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Book;
use App\Models\Post;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $books=Book::all();
        $request->validate([
            'category_id' =>['integer'],
           ]);
           $q=Book::query();
    if ($request->category_id)
        $q->where('category_id',$request->category_id);
        $books=$q->get();
        return BookResource::collection($books);
    }

    public function show($id)
    {
        $book=Book::find($id);
        if($book){
            return $this->apiResponse(new BookResource($book),'ok',200);
        }
        return $this->apiResponse(null,'The Book Not Found',404);
    }   
}    

