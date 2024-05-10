<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Root;
use Illuminate\Http\Request;

class RootController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:root-list', ['only' => ['index','show']]);
         $this->middleware('permission:root-create', ['only' => ['create','store']]);
         $this->middleware('permission:root-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:root-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roots=Root ::all();
        return view('roots.index', compact('roots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roots=Root ::all();
        return view('roots.create',compact('roots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>['required','string'],
        ]);
        $root=new Root();
        $root->name=$request->name;
        $root->save();
        return redirect()->route('roots.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Root $root)
    {
        return view('roots.show',compact('root'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Root $root)
    {
        return view('roots.edit',compact('root'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Root $root)
    {
        $request->validate([
            'name' =>['required','string'],
        ]);
        $root->name=$request->name;
        $root->save();
        return redirect()->route('roots.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Root $root)
    {
        $root->delete();
        return redirect()->route('roots.index');
    }
}
