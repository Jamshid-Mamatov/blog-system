@extends('layouts.blog')


@section('content')



    <div class="blog-main">
        @foreach ($blogs as $blog)
            <div class="blog-item">
                <div class="heading-blog">
                    {{ $blog->title }}
                </div>
                <a href="{{ route('blog.show', $blog->id) }}">
                    <img src="{{ asset('assets/img/' . $blog->image) }}" class="img-responsive img-rounded" alt="{{ $blog->title }}" />
                </a>
                <div class="blog-info">
                    <span class="label label-primary">Posted on {{ $blog->created_at->format('jS F Y') }}</span>
                    <span class="label label-success">In {{ $blog->category->name ?? 'Uncategorized' }}</span>
                    <span class="label label-danger">By {{ $blog->author->name ?? 'Admin' }}</span>
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
    </div>
    <div class="pagination">
        {{ $blogs->links() }}
    </div>
@endsection
