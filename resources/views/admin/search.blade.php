@extends('admin.layout')
@section('content')

@if($blogs->isNotEmpty())
    @foreach ($blogs as $blog)
        <div class="blog-list">
            <p>{{ $blog->title }}</p>
            <img src="{{ $blog->image }}">
        </div>
    @endforeach
@else 
    <div>
        <h2>No blogs found</h2>
    </div>
@endif

@endsection