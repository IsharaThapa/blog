<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create(){
        return view ('admin.blog.create');

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
        $blog->slug = str::slug($request->slug);
        $blog->body = $request->body;
        $blog->author_name = $request->author_name ;
        if($blog->save()){
            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');

        }
        else{
            return redirect('/blog')->with('error','Error');
        }     
    }

    public function edit ($slug){
        $blog = Blog::find($slug);
        return view('admin.blog.edit',compact('blog'));

    }

    public function update(request $request,$slug){
    
        if($request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $file ->move(public_path('/images'),$filename);
        }
        $blog = Blog::where ('slug',$slug)->fistorfail;
      
        $blog->id = $request->id;
        $blog->title = $request->title ;
        $blog->slug =uniqid(). str::slug($request->title);
        $blog->body = $request->body;
        $blog->author_name = $request->author_name ;
        if($blog->save()){
            echo "Saved";
        }
    }
    public function show($slug){
        $blog = Blog::find($slug);
        return view ('admin.blog.show');

    }
    public function destroy($slug){
        $blog = Blog::find($slug);
        if($blog->delete()){
            echo "Deleted";
        }
        else{
            echo "Not deleted";
        }
    }
}
