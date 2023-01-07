@extends('admin.layout')   
@section('content')
    <main>
       
        <div class="back-icon">
            <a href= "/admin/testimonial"><i class="bi bi-arrow-left-square create-back"></i></a>
        </div>
        <div class="container">
            <div class="create-form">
                <form action="{{route( 'admin.testimonial.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group mb-0">
                        <label for="title mb-0">Name</label>
                        <div class="input-group name">
                            <input type="text" class="form-control" placeholder="name" name="name"/>
                        </div>
                    </div>
                    
                    <div class=" form-group mb-0">
                        <label for="description">Description</label>
                            <div class="content " >
                                <textarea class="form-control" id="description" placeholder="eg:description" name="body"></textarea>
                            </div>
                    </div>
                    <div class=" form-group mb-0">
                            <label for="title">Image</label>
                                <div class="image input-group">
                                    <input type="file" class="img form-control" name="image">
                                </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for ="designation">Designation</label>
                            <div class="designation-testimonial input-group">
                                <input type="text" class="form-control" placeholder="designation" name="position" required/>
                            </div>                       
                    </div>
                    <div class=" form-group mb-0">
                        <label for ="designation">Address</label>
                            <div class="address-testimonial input-group">
                                <input type="text" class="form-control" placeholder="address" name="address" required/>
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