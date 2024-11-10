@extends('layouts.blog')

@section('content')
    <div class="container">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control mb-3" placeholder="Title" required>
            <textarea name="body" class="form-control mb-3" placeholder="Content" required></textarea>
            <textarea name="slug" class="form-control mb-3" placeholder="Slug" required ></textarea>

            <input type="file" name="image_path" class="form-control mb-3">
            <button type="submit" class="btn btn-success">Create Blog</button>
        </form>
    </div>
@endsection
