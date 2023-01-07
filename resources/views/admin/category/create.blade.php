@extends('admin.layout')
@section('content')
<main>
        <div class="container">
            <div class="create-form">
                <form action="{{route( 'admin.category.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group mb-0">
                        <label for="title" >Category name</label>
                            <div class="category-name input-group">
                                <input type="text" class="form-control" placeholder="category-name" name="name">
                            </div>
                    </div>
                        <div class="form-group mb-0">
                            <label for="number">Parent Category</label>
                            <select class="form-control form-control-user" name="parent_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="submit-button">
                            <button type="submit"class="btn btn btn-secondary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </main>
    
@endsection