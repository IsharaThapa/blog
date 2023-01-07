@extends('admin.layout')
@section('content')
    <main>
        <div class="back-icon">
            <a href= "/admin/testimonial"><i class="bi bi-arrow-left-square create-back"></i></a>
        </div>
        <div class="container">
            <div class="edit-form">
                <form action ="{{ route('admin.testimonial.update', $testimonial->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class=" form-group mb-0">
                        <label for="title">Name</label>
                            <div class="title input-group">
                                <input type="text" class="form-control" placeholder="name" name="name" value=" {{ $testimonial->name }}" >
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="title" >Address</label>
                            <div class="author-name">
                                <input type="text" class="form-control" placeholder="author-name" name="author_name" value=" {{$testimonial->address}}" >
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                            <label for="title">Image</label>
                                <div class="content">
                                    <input type="file" class="form-control" placeholder="upload image" name="image" value=" {{$testimonial->image}}" >
                                </div>
                    </div>
                    
                    <div class=" form-group mb-0">
                        <label for="description">Description</label>
                            <div class="content " >
                                <textarea class="form-control" id="description"  name="body">  </textarea>
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="title" >Designation</label>
                            <div class="author-name">
                                <input type="text" class="form-control" placeholder="designation" name="position" value=" {{$testimonial->position}}" >
                            </div>
                    </div>

                    <div class="button">
                        <button type="submit" class="btn btn-secondary btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
  @endsection  
