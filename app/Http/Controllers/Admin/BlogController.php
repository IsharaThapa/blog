<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(){
        $blogs = Blog::all();
        return view ('', compact(''));

    }
    public function store(Request $request){
        if($request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $file ->move(public_path('/images'),$filename);
        }
        $blog = new Blog();
        $blog->id = $request->id;
        $blog->title = $request->title ;
        $blog->body = $request->body;
        $blog->author_name = $request->author_name ;
        if($blog->save()){
            echo "Saved";
        }
        else{
            return redirect('/')
        }
       
           
          

        
        
    }
    public function edit (){
        
    }
    public function show(){

    }
    public function destroy(){
        
    }
}
