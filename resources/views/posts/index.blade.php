@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Blog</h2>
                    <p class="text-muted mb-0">Discover articles, tutorials, and insights from our community</p>
                </div>
                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                @endauth
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @forelse($posts as $post)
                <div class="card mb-4">
                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" 
                             class="card-img-top" 
                             alt="{{ $post->title }}"
                             style="width: 100%; height: 350px; object-fit: cover; object-position: center;">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-muted small">
                            By {{ $post->user->name }} | {{ $post->created_at->format('M d, Y') }}
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-chat-heart me-1"></i>{{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}
                        </p>
                        <p class="card-text">{{ Str::limit($post->description, 200) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                            @can('update', $post)
                                <div>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <p class="mb-0">No posts found. @auth <a href="{{ route('posts.create') }}">Create the first post!</a> @endauth</p>
                </div>
            @endforelse

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
