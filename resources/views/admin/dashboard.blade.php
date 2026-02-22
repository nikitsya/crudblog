@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <div>
            <h2 class="mb-1">Admin Dashboard</h2>
            <p class="text-muted mb-0">System overview and quick statistics.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-2">
            <div class="card card-body text-center">
                <h6 class="text-muted">Admins</h6>
                <h3 class="mb-0">{{ $stats['admins'] }}</h3>
            </div>
        </div>
        <div class="col-md-6 col-lg-2">
            <div class="card card-body text-center">
                <h6 class="text-muted">Users</h6>
                <h3 class="mb-0">{{ $stats['users'] }}</h3>
            </div>
        </div>
        <div class="col-md-6 col-lg-2">
            <div class="card card-body text-center">
                <h6 class="text-muted">Posts</h6>
                <h3 class="mb-0">{{ $stats['posts'] }}</h3>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-body text-center">
                <h6 class="text-muted">Comments</h6>
                <h3 class="mb-0">{{ $stats['comments'] }}</h3>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-body text-center">
                <h6 class="text-muted">Categories</h6>
                <h3 class="mb-0">{{ $stats['categories'] }}</h3>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Latest Posts</h5>
        </div>
        <div class="card-body">
            @forelse($latestPosts as $post)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>{{ $post->title }}</span>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y H:i') }}</small>
                </div>
            @empty
                <p class="text-muted mb-0">No posts available yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
