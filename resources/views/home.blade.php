@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="home-hero text-white py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold mb-4">Welcome to Laravel Blog</h1>
                <p class="lead mb-4">Build, Learn, and Share Your Coding Journey</p>
                <p class="fs-5 mb-4">A modern blogging platform built with Laravel. Share your thoughts, tutorials, and experiences with the developer community.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('blog.index') }}" class="btn btn-light btn-lg px-4">Explore Blog Posts</a>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">Get Started</a>
                    @else
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-light btn-lg px-4">Write a Post</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Three Column Feature Section -->
<div class="container py-5 my-5">
    <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
            <h2 class="display-5 fw-bold mb-3">Explore Fresh Blog Content</h2>
            <p class="lead text-muted">Read tutorials, tips, and real development stories from our blog.</p>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=500&fit=crop" 
                     class="card-img-top" 
                     alt="Practical Tutorials"
                     style="height: 250px; object-fit: cover;">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-code-slash fs-1 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Practical Tutorials</h3>
                    <p class="text-muted">Step-by-step guides and code examples to help you build real Laravel projects with confidence.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=500&fit=crop" 
                     class="card-img-top" 
                     alt="Developer Community"
                     style="height: 250px; object-fit: cover;">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-people fs-1 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Developer Community</h3>
                    <p class="text-muted">Read insights from other developers, share ideas, and learn from real-world coding experiences.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&h=500&fit=crop" 
                     class="card-img-top" 
                     alt="Quick Publishing"
                     style="height: 250px; object-fit: cover;">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-lightning-charge fs-1 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Quick Publishing</h3>
                    <p class="text-muted">Create, edit, and publish your posts quickly with a clean workflow designed for everyday writing.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="blush-panel py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="display-6 fw-bold mb-4">Powerful Features for Modern Blogging</h2>
                <p class="lead text-muted mb-4">Everything you need to create, manage, and share your content effectively.</p>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <strong>Rich Text Editor</strong> - Write and format your posts with ease
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <strong>Image Uploads</strong> - Add beautiful featured images to your posts
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <strong>SEO Friendly</strong> - Automatic slug generation for better search visibility
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <strong>User Authentication</strong> - Secure login and registration system
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <strong>Post Management</strong> - Full CRUD operations for your content
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=600&fit=crop" 
                     class="img-fluid rounded shadow" 
                     alt="Coding workspace">
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="container py-5 my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="display-5 fw-bold mb-4">Ready to Start Your Blogging Journey?</h2>
            <p class="lead text-muted mb-4">Join our community of developers and start sharing your knowledge today.</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 me-3">Sign Up Free</a>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg px-5">View Posts</a>
            @else
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg px-5 me-3">Create Your First Post</a>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg px-5">View All Posts</a>
            @endguest
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="pink-stats text-white py-5">
    <div class="container py-4">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="display-4 fw-bold text-primary">{{ \App\Models\Post::count() }}+</div>
                <p class="lead mb-0">Blog Posts</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="display-4 fw-bold text-primary">{{ \App\Models\User::count() }}+</div>
                <p class="lead mb-0">Active Users</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="display-4 fw-bold text-primary">100%</div>
                <p class="lead mb-0">Free & Open</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="display-4 fw-bold text-primary">24/7</div>
                <p class="lead mb-0">Available</p>
            </div>
        </div>
    </div>
</div>
@endsection
