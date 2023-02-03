<?php

namespace App\Http\Controllers\admin;
use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.book.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name ;
        $book->slug = str::slug($request->name).time();
        $book->price= $request->price;
        $book->categories_id = $request->categories_id;
        $book->addMediaFromRequest('image')->toMediaCollection();
        $book->author_name = $request->author_name ;
        if($book->save()){
             return redirect()->route('admin.book.index')->with('success', 'Book added successfully');
        
        }
        else{
            return redirect()->route('admin.book.index')->with('error','Book cannot be added.');
        }     
    }

        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $book = Book::whereSlug($slug)->first();
        $categories = Category::all();
        return view('admin.book.edit',compact('book','categories'));

    }
        
   
     
    public function update(Request $request, $slug)
    {
        $book = Book::whereSlug($slug)->first();
    
        $book->name = $request->name ;
        $book->price = $request->price;
        $book->slug =uniqid().str::slug($request->name);
        $book->categories_id = $request->categories_id;
        $book->addMediaFromRequest('image')->toMediaCollection();
        $book->author_name = $request->author_name ;

        if($book->save()){
            return redirect()->route('admin.book.index')->with('success', 'Book edited successfully');
       
       }
       else{
           return redirect()->route('admin.book.index')->with('error','Book cannot be updated.');
       }
    }

    
    public function destroy($slug)
    {
        $book = Book::where('slug',$slug)->first();
        if($book->delete()){
            return redirect()->route('admin.book.index')->with('success', 'Book deleted successfully');
       
       }
       else{
           return redirect()->route('admin.book.index')->with('error','Book cannot be deleted.');
       } 
    } 
}
