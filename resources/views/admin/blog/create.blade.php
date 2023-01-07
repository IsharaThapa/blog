@extends('admin.layout')   
@section('content')
    <main>
       
        <div class="back-icon">
            <a href= "/admin/blog"><i class="bi bi-arrow-left-square create-back"></i></a>
        </div>
        <div class="container">
            <div class="create-form">
                <form action="{{route( 'admin.blog.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group mb-0">
                        <label for="title mb-0">Title</label>
                            <div class="input-group title">
                                <input type="text" class="form-control" placeholder="title" name="title">
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="title" >Author name</label>
                            <div class="author-name input-group">
                                <input type="text" class="form-control" placeholder="author-name" name="author_name">
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                            <label for="title">Image</label>
                                <div class="image input-group">
                                    <input type="file" class="img form-control" name="image">
                                </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for ="Category">Category</label>
                            <div class="category-blog input-group">
                            <select name="categories_id" class="form-control" >
                                <option value="category" name="category">Select Category</option>
                                @foreach($categories as $category)
                                <option value= "{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                            </div>                       
                    </div>
                    <div class=" form-group mb-0">
                        <label for="description">Description</label>
                            <div class="content " >
                                <textarea class="form-control" id="description" placeholder="eg:description" name="body"></textarea>
                            </div>
                    </div>
                    
                    <div class="button  ">
                        <button type="submit" class="btn btn btn-secondary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection