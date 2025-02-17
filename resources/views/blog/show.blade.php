
@extends('layouts.blog')

@section('content')
    <div class="blog-main">
        <div class="heading-blog">
            {{ $blog->title }}
        </div>
        <img src="{{ asset('storage/' . $blog->image_path) }}" class="img-responsive img-rounded" alt="{{ $blog->title }}" />

        <div class="blog-info">
            <span class="label label-primary">Posted on {{ $blog->created_at->format('jS F Y') }}</span>
            <span class="label label-success">In {{ $blog->category->name ?? 'Uncategorized' }}</span>
            <span class="label label-danger">By {{ $blog->author->name ?? 'Admin' }}</span>
{{--            <span class="label label-info">--}}
{{--                <i class="fa fa-thumbs-up"></i> + {{ $blog->likes_count }}--}}
{{--                <i class="fa fa-thumbs-down"></i> - {{ $blog->dislikes_count }}--}}
{{--            </span>--}}
        </div>

        <div class="blog-txt">
            {!! $blog->body !!}
        </div>
    </div>
    @if (auth()->check() && auth()->user()->id==$blog->user_id)
        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif

    <br>
    <br>
    <form action="{{ route('comment.store', $blog->id) }}" method="POST">
        @csrf
        <textarea name="content" class="form-control" placeholder="Add your comment here..." required></textarea>
        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
    </form>
    <!-- Comments Section -->
    <h3><strong>Recent Comments:</strong></h3>
    <hr />
    <ul class="media-list">
        @forelse ($blog->comments as $comment)
            <li class="media">
                <a class="pull-left" href="#">
                    <img class="media-object img-circle" src="{{ asset('storage/' . ($comment->user->avatar ?? 'user.png')) }}" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->user->name ?? 'Guest' }} </h4>
                    <span>{{ $comment->created_at }}</span>
                    <br>
                    <p>{{ $comment->content }}</p>


                    <!-- Nested Comments -->
                    @if($comment->replies)
                        <div class="media">
                            @foreach($comment->replies as $reply)
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="{{ asset('assets/img/' . ($reply->user->avatar ?? 'user.png')) }}" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $reply->user->name ?? 'Guest' }}</h4>
                                    <p>{{ $reply->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </li>
        @empty
            <li>No comments yet. Be the first to comment!</li>
        @endforelse
    </ul>
@endsection
