<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = Category::with('parent')->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request-> name; 
        $category->parent_category = $request->parent_id;
        if($category->save()){
            return redirect('/admin/category')->with('success','Category created successfully.');
        }
        else{
            return redirect('/admin/category')->with('error','Category cannot be created ');

        }

       }

    public function edit($id){
        $category = Category::where('id',$id)->with('parent')->firstorfail();
        $listCategory = Category::all();
        return view('admin.category.edit',compact('category', 'listCategory'));

    }

    public function update(Request $request,$id){
        $category = Category::where('id',$id)->firstorfail();
        $category->name = $request->name ;
        $category->parent_category = $request->parent_id;

        if($category->save()){
            return redirect ('/admin/category')->with('Success','Category updated successfully.');
        }
        else{
            return redirect ('/admin/category')->with('Error','Category cannot be updated.');

        }

    }
    public function show(){

    }
    public function destroy($id){
        $category = Category::find($id);
        if($category->delete()){
            return redirect('/admin/category')->with('success','Category deleted successfully.');


    }
    else{
        return redirect('/admin/category')->with('error','Category deleted successfully.');

    }
}
}
