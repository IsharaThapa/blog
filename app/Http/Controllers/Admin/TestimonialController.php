<?php

namespace App\Http\Controllers\Admin;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    public function create(){
        return view ('admin.testimonial.create');

    }
    public function show($slug){
        $testimonial = Testimonial::whereSlug($slug)->firstOrFail();
        return view ('admin.testimonial.show');

    }

    public function store(Request $request){
        $testimonial = new Testimonial();

        if($file = $request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $testimonial->image = $filename;
            $file ->move(public_path('/images'),$filename);
        
        }
        $testimonial->id = $request->id;
        $testimonial->name = $request->name ;
        $testimonial->address = $request->address; 
        $testimonial->slug=str::slug($request->title).time();
        $testimonial->body = $request->body;
        $testimonial->position = $request->position;
        if($testimonial->save()){
             return redirect()->route('admin.testimonial.index')->with('success', 'testimonial created successfully');

        }
        else{
            return redirect()->route('admin.testimonial.index')->with('error','Error');
        }     
    }

    public function edit ($slug){
        $testimonial = Testimonial::whereSlug($slug)->first();
       
        return view('admin.testimonial.edit',compact('testimonial'));

    }

    public function update(request $request,$slug){

        $testimonial = Testimonial::whereSlug ($slug)->fistorfail();

        if($file = $request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $file ->move(public_path('/images'),$filename);
        }
      
        $testimonial->id = $request->id;
        $testimonial->name = $request->name ;
        $testimonial->address = $request->address; 
        $testimonial->image = $file;
        $testimonial->slug=str::slug($request->title).time();
        $testimonial->body = $request->body;
        $testimonial->position = $request->position;
        
        if($testimonial->save()){
            return redirect()->route('admin.testimonial.index')->with('success', 'testimonial deleted successfully');
        }
        else{
            return redirect()->route('admin.testimonial.index')->with('success', 'testimonial deleted successfully');

        }
    }
  
    public function destroy($slug){
        $testimonial = testimonial::whereSlug($slug);
        if($testimonial->delete()){
            return redirect()->route('admin.testimonial.index')->with('success', 'testimonial deleted successfully');
        }
        else{
            return redirect()->route('admin.testimonial.index')->with('success', 'testimonial deleted successfully');

        }
    }
}

