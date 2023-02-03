<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class FrontBookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view ('home' ,compact('books'));
    }
}
