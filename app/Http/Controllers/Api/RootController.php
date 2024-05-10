<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RootResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Root;
use Illuminate\Http\Request;

class RootController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $roots=Root::all();
        $request->validate([
            'parent_id' =>['integer'],
           ]);
           $q=Root::query();
    if ($request->parent_id)
        $q->where('parent_id',$request->parent_id);
        $roots=$q->get();
        return RootResource::collection($roots);
    }
}
