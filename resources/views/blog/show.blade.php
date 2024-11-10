
@extends('layouts.blog')

@section('content')
    <div class="blog-main">
        <div class="heading-blog">
            {{ $blog->title }}
        </div>
        <img src="{{ asset('assets/img/' . $blog->image) }}" class="img-responsive img-rounded" alt="{{ $blog->title }}" />

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

    <!-- Comments Section -->
    <h3><strong>Recent Comments:</strong></h3>
    <hr />
    <ul class="media-list">
        @forelse ($blog->comments as $comment)
            <li class="media">
                <a class="pull-left" href="#">
                    <img class="media-object img-circle" src="{{ asset('assets/img/' . ($comment->user->avatar ?? 'user.png')) }}" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->user->name ?? 'Guest' }}</h4>
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
