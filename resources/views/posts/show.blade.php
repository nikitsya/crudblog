@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary back-to-posts-btn">
                    &larr; Back to Posts
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                @if($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title mb-3">{{ $post->title }}</h1>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-muted">
                            <small>
                                By <strong>{{ $post->user->name }}</strong> | 
                                {{ $post->created_at->format('F j, Y \a\t g:i a') }}
                                <span class="ms-2">| Category: {{ $post->category?->name ?? 'Uncategorized' }}</span>
                                @if($post->created_at != $post->updated_at)
                                    <span class="ms-2">(Updated: {{ $post->updated_at->format('M d, Y') }})</span>
                                @endif
                            </small>
                        </div>
                        @can('update', $post)
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <div class="card-text">
                        {!! nl2br(e($post->description)) !!}
                    </div>

                    <hr class="my-4">

                    <div>
                        <h4 class="mb-3">Comments ({{ $post->comments->count() }})</h4>

                        @auth
                            <form action="{{ route('posts.comments.store', $post) }}" method="POST" class="mb-4">
                                @csrf
                                <div class="mb-2">
                                    <label for="content" class="form-label">Add a comment</label>
                                    <textarea
                                        id="content"
                                        name="content"
                                        rows="3"
                                        class="form-control @error('content') is-invalid @enderror"
                                        placeholder="Write your comment..."
                                        required
                                    >{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Post Comment</button>
                            </form>
                        @else
                            <p class="text-muted mb-4">
                                <a href="{{ route('login') }}">Log in</a> to add a comment.
                            </p>
                        @endauth

                        @forelse($post->comments as $comment)
                            <div class="border rounded-3 p-3 mb-3 bg-white">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <small class="text-muted">{{ $comment->created_at->format('M d, Y \\a\\t g:i a') }}</small>
                                </div>
                                <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                            </div>
                        @empty
                            <div class="alert alert-info mb-0">
                                No comments yet. Be the first to comment.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
