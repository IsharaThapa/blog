@extends('admin.layout')
@section('content')
<main>
    <div class="container">
        <div class="edit-form">
            <form action="{{ route('admin.blog.update', $blog->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class=" form-group mb-0">
                    <label for="title">Title</label>
                    <div class="title input-group">
                        <input type="text" class="form-control" placeholder="title" name="title"
                            value=" {{ $blog->title }}">
                    </div>
            </div>
                <div class=" form-group mb-0">
                    <label for="title">Author name</label>
                    <div class="author-name">
                        <input type="text" class="form-control" placeholder="author-name" name="author_name"
                            value=" {{$blog->author_name}}">
                    </div>
                </div>
                <div class=" form-group mb-0">
                    <label for="title">Image</label>
                    <div class="content">
                        <input type="file" class="form-control" placeholder="upload image" name="image"
                            value=" {{$blog->image}}">
                    </div>
                </div>
                <div class=" form-group mb-0">
                    <label for="Category">Category</label>
                    <div class="category-blog input-group">
                        <select name="categories_id" class="form-control">

                            @foreach($categories as $category)
                            <option value="{{ $category->id === $blog->category_id ? ' selected' : '' }}">{{
                                $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class=" form-group mb-0">
                    <label for="description">Description</label>
                    <div class="content ">
                        <textarea class="form-control" id="description" name="body"> {{ $blog->body }} </textarea>
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