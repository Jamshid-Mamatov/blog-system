@extends('layouts.blog')


@section('content')


    <a href="{{ route('blog.create') }}" class="btn btn-primary">Create Blog</a>
    <div class="blog-main">

        @if(isset($query))
            <h4>Search Results for: "{{ $query }}"</h4>
        @endif

        @if($blogs->count() > 0)
            @foreach($blogs as $blog)
                    <div class="blog-item">
                        <div class="heading-blog">
                            {{ $blog->title }}
                        </div>
                        <a href="{{ route('blog.show', $blog->id) }}">
                            <img src="{{ asset('storage/' . $blog->image_path) }}" class="img-responsive img-rounded" alt="{{ $blog->title }}" />
                        </a>
                        <div class="blog-info">
                            <span class="label label-primary">Posted on {{ $blog->created_at->format('jS F Y') }}</span>
                            {{--                    <span class="label label-success">In {{ $blog->category->name ?? 'Uncategorized' }}</span>--}}
                            <span class="label label-danger">By {{ $blog->user->name ?? 'Admin' }}</span>
                            {{--                    <span class="label label-info">--}}
                            {{--                        <i class="fa fa-thumbs-up"></i> + {{ $blog->likes_count }}--}}
                            {{--                        <i class="fa fa-thumbs-down"></i> - {{ $blog->dislikes_count }}--}}
                            {{--                    </span>--}}
                        </div>
                        <div class="blog-txt">
                            {{ Str::limit($blog->body, 200) }}
                        </div>
                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                    </div>
            @endforeach

            {{ $blogs->links() }}
        @else
            <p>No posts found.</p>

            @foreach ($blogs as $blog)
                <div class="blog-item">
                    <div class="heading-blog">
                        {{ $blog->title }}
                    </div>
                    <a href="{{ route('blog.show', $blog->id) }}">
                        <img src="{{ asset('storage/' . $blog->image_path) }}" class="img-responsive img-rounded" alt="{{ $blog->title }}" />
                    </a>
                    <div class="blog-info">
                        <span class="label label-primary">Posted on {{ $blog->created_at->format('jS F Y') }}</span>
    {{--                    <span class="label label-success">In {{ $blog->category->name ?? 'Uncategorized' }}</span>--}}
                        <span class="label label-danger">By {{ $blog->user->name ?? 'Admin' }}</span>
    {{--                    <span class="label label-info">--}}
    {{--                        <i class="fa fa-thumbs-up"></i> + {{ $blog->likes_count }}--}}
    {{--                        <i class="fa fa-thumbs-down"></i> - {{ $blog->dislikes_count }}--}}
    {{--                    </span>--}}
                    </div>
                    <div class="blog-txt">
                        {{ Str::limit($blog->body, 200) }}
                    </div>
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>
            @endforeach
            @endif
    </div>

    <div class="pagination">
        {{ $blogs->links() }}
    </div>
@endsection
