@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action=" {{ route('admin.search') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control bg-light border-2 small"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    
                    </div>
                </form>
           </div>
            <div class="col-6">
                <div class="button add-post">
                    <a href="/admin/book/create"><button type="submit" class="btn btn-primary top-bottom">Add
                            book</button></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="index-table">
                <table class="table table-stripped 1px ">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Image</td>
                            <td>Author Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->category != null ? $book->category->name : '' }}</td>
                            <td>
                                <img src="{{ $book->getFirstMediaUrl() != null ? $book->getFirstMediaUrl() : $book->getFirstMediaUrl('image')   }}" alt="" width="100px">
                            </td>
                            <td>{{ $book->author_name }}</td>
                            <td>
                                <div class="action">
                                    <div class="action-button">
                                        <div class="edit-button">
                                            <a href="{{ route('admin.book.edit',$book->slug)}}"
                                                class="btn btn-secondary  edit-btn">Edit</a>
                                        </div>
                                        <div class="delete-button">
                                            <form action="{{route('admin.book.destroy', $book->slug)}}" method="post">
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