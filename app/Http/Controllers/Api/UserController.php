<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponseTrait;
    public function index($id)
    {
        $user = User::findOrFail($id);
        $books = $user->books()->get();
        return BookResource::collection($books);
    }
}
