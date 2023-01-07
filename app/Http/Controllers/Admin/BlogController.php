<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $blogs = Blog::with('category')->get();
        if($request->query('search'))
        {
                $search = $request->input('search');
            
                // Search in the title and body columns from the posts table
                $blogs = Blog::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->get();
            
                // Return the search view with the resluts compacted
                return view('admin.blog.index', compact('blogs'));
            } 
        
        // $categories = Category::with('blog')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create(){
        $blogs = Blog::all();
        $categories = Category::all();
        
        return view ('admin.blog.create',compact('blogs','categories'));

    }

    public function store(Request $request){
        $blog = new Blog();
        
        if($request->file('image')){
            $file = $request->file('image');
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $blog->image = $filename;
            $file ->move(public_path('/images'),$filename);
        }
       
        $blog->title = $request->title ;
        $blog->slug = str::slug($request->title).time();
        $blog->body = $request->body;
        $blog->categories_id = $request->categories_id;
        $blog->author_name = $request->author_name ;
        if($blog->save()){
             return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
        
        }
        else{
            return redirect()->route('admin.blog.index')->with('error','Blog cannot be created.');
        }     
    }

    public function edit ($slug){
        $blog = Blog::whereSlug($slug)->first();
        $categories = Category::all();
        return view('admin.blog.edit',compact('blog','categories'));

    }

    public function update(Request $request,$slug){
         $blog = Blog::whereSlug($slug)->first();
    
        if($file=$request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time(). $file->getClientOriginalName();
            $blog->image = $filename;
            $file ->move(public_path('/images'),$filename);
        }
      
        $blog->title = $request->title ;
        $blog->slug =uniqid(). str::slug($request->title);
        $blog->categories_id = $request->categories_id;
        $blog->body = $request->body;
        $blog->author_name = $request->author_name ;

        if($blog->save()){
            return redirect()->route('admin.blog.index')->with('success', 'Blog edited successfully');
       
       }
       else{
           return redirect()->route('admin.blog.index')->with('error','Blog cannot be updated.');
       } 
    }
    public function show($slug){
        $blog = Blog::whereSlug($slug)->firstOrFail();
        return view ('admin.blog.show');

    }
    public function destroy($slug){
        $blog = Blog::where('slug',$slug)->first();
        if($blog->delete()){
            return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully');
       
       }
       else{
           return redirect()->route('admin.blog.index')->with('error','Blog cannot be deleted.');
       } 
    }
    
}
