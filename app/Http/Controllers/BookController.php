<?php
    
namespace App\Http\Controllers;
    
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
    
class BookController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:book-list', ['only' => ['index','show']]);
         $this->middleware('permission:book-create', ['only' => ['create','store']]);
         $this->middleware('permission:book-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:book-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category ::all(); 
        return view('books.create',compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'author' => 'required',
            'category_id'=>['required','integer','exists:categories,id'],
        ]);
    
        $book= new Book();
        $book->name=$request->name;
        $book->author=$request->author;
        $book->category_id=$request->category_id;
        $book->save();
    
        return redirect()->route('books.index')
        ->with('success','book created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
         request()->validate([
            'name' => 'required',
            'author' => 'required',
        ]);
    
        $book->update($request->all());
    
        return redirect()->route('books.index')
                        ->with('success','book updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
    
        return redirect()->route('books.index')
                        ->with('success','book deleted successfully');
    }
}