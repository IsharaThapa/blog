@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="button add-post">
                <a href="/admin/blog/create"><button type="submit" class="btn btn-primary top-bottom">Add
                        blog</button></a>
            </div>
        </div>

        <div class="row">
            <div class="index-table">
                <table class="table table-stripped 1px ">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Body</td>
                            <td>Category</td>
                            <td>Image</td>
                            <td>Author Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->body, 15, '...') }}</td>
                            <td>{{ $blog->category->name }}</td>
                            <td>@if ($blog->image)
                                <img src="/images/{{$blog->image}}" height="50px" width="50px">
                                @endif
                            </td>
                            <td>{{ $blog->author_name }}</td>
                            <td>
                                <div class="action">
                                    <div class="action-button">
                                        <div class="edit-button">
                                            <a href="{{ route('admin.blog.edit',$blog->slug)}}"
                                                class="btn btn-secondary  edit-btn">Edit</a>
                                        </div>
                                        <div class="delete-button">
                                            <form action="{{route('admin.blog.destroy', $blog->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger delete-btn" type="submit">Delete</a>
                                            </form>
                                        </div>

                                    </div>


                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection