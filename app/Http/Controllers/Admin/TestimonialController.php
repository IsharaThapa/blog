<?php

namespace App\Http\Controllers\Admin;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    public function create(){
        return view ('admin.testimonial.create');

    }

    public function store(Request $request){
        if($request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $file ->move(public_path('/images'),$filename);
        }
        $testimonial = new Testimonial();
        $testimonial->id = $request->id;
        $testimonial->name = $request->name ;
        $testimonial->address = $request->address; 
        $testimonial->body = $request->body;
        $testimonial->position = $request->position;
        if($testimonial->save()){
            return redirect()->route('admin.testimonial.index')->with('success', 'testimonial created successfully');

        }
        else{
            return redirect('/testimonial')->with('error','Error');
        }     
    }

    public function edit ($slug){
        $testimonial = Testimonial::find($slug);
        return view('admin.testimonial.edit',compact('testimonial'));

    }

    public function update(request $request,$slug){
        if($request->file('image')){
            // $filename = uniqid().str::random(10).'.'.$file->getClientOriginalExtention();
            $filename = time().$file->getClientOriginalName();
            $file ->move(public_path('/images'),$filename);
        }
        $testimonial = Testimonial::where ('slug',$slug)->fistorfail;
      
        $testimonial->id = $request->id;
        $testimonial->name = $request->name ;
        $testimonial->address = $request->address; 
        $testimonial->body = $request->body;
        $testimonial->position = $request->position;
        
        if($testimonial->save()){
            echo "Saved";
        }
    }
    public function show($slug){
        $testimonial = testimonial::find($slug);
        return view ('admin.testimonial.show');

    }
    public function destroy($slug){
        $testimonial = testimonial::find($slug);
        if($testimonial->delete()){
            echo "Deleted";
        }
        else{
            echo "Not deleted";
        }
    }
}

