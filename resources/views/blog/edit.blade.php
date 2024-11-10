@extends('layouts.blog')

@section('content')
    <div class="container">
        <h1>Edit Blog Post</h1>

        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control">{{ old('body', $blog->body) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update Post</button>
        </form>
    </div>
@endsection
