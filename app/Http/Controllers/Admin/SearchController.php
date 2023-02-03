<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   
    public function Search(Request $request){
        $search = $request->input('search');
        $url = url()->previous();
        if(str_contains($url, 'blog'))
        {
            $data = Blog::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('body', 'LIKE', "%{$search}%")
                ->orWhere('author_name', 'LIKE', "%{$search}%")
                ->get();
        }
        else{
            $data = Book::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('author_name', 'LIKE', "%{$search}%")
            ->get();
        }
        // if(request()->path())
        // {

        // }
        return response()->json(['data'=>$data]);
    }
    public function bookSearch(Request $request){
        $search = $request->input('search');

        $books = Book::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('author_name', 'LIKE', "%{$search}%")
            ->get();
        return response()->json(['books'=>$books]);

    }
    }


