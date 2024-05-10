<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Root;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category ::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category ::all(); 
        $roots=Root::all();
        return view('categories.create',compact('categories','roots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>['required','string'],
            'parent_id'=>['required','integer','exists:roots,id'],
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>['required','string'],
        ]);
        $category->name=$request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
