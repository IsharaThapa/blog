<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
       $blogs = Blog::all();
       $categories = Category::all();
       $testimonials = Testimonial::all();
        return view ('admin.dashboard',compact('blogs','categories','testimonials'));
    }
   
}
