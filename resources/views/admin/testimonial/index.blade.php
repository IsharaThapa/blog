@extends('admin.layout')
@section('content')
    <main>
       <div class="button add-post">
            <a href="/admin/testimonial/create"><button type="submit" class="btn btn-primary top-bottom">Add testimonial</button></a>
       </div>


        <div class="index-table">
            <table class="table table-stripped 1px ">
                <thead>
                   <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Body</td>
                        <td>Image</td>
                        <td>Designation</td>
                        <td>Address</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)              
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ Str::limit($testimonial->body, 15, '...') }}</td>
                            <td>@if ($testimonial->image)
                                <img src= "/images/{{$testimonial->image}}" height="60px" width="60px">
                                @endif
                            </td>
                            <td>{{ $testimonial->position }}</td>
                            <td>{{ $testimonial->address }}</td>
                            <td>
                                <div class="action">
                                        <div class="action-button">
                                            <div class="edit-button">
                                                <a href="{{ route('admin.testimonial.update',$testimonial->slug) }}" class="btn btn-secondary edit-btn">Edit</a>
                                            </div>
                                            <div class="delete-button">
                                                <form action="{{route('admin.testimonial.destroy', $testimonial->slug)}}" method="post">
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