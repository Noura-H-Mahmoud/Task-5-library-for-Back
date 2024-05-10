<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $categories=Category::all();
        $request->validate([
            'parent_id' =>['integer'],
           ]);
           $q=category::query();
    if ($request->parent_id)
        $q->where('parent_id',$request->parent_id);
        $categories=$q->get();
        return CategoryResource::collection($categories);
    } 
}
