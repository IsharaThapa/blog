@extends('admin.layout')
@section('content')
   
    <main>
    <div class="button add-post">
           <a href="/admin/category/create"> <button type="submit" class="btn btn-primary top-bottom">Add category</button></a>
       </div>
        <div class="index-table">
            <table class="table " id="table">
                <thead>
                   <tr>
                        <td>Id</td>
                        <td>Category</td>
                        <td>Sub category</td>
                        <td>Action</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)              
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ !empty($category->parent->name) ? $category->parent->name : '-'  }}</td>
                            <td>
                                <div class="action">
                                       <div class="action-button">
                                            <div class="edit-button">
                                                <a href="{{ route('admin.category.edit',$category->id)}}" class="btn btn-secondary edit-btn ">Edit</a>
                                            </div> 
                                           <div class="delete-button">
                                            <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                               <button  class="btn btn-danger delete-btn" type="submit">Delete</a>
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
    </main>
@endsection