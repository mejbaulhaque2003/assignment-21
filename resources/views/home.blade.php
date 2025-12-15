@extends('layouts.app')

@section('title','Home')

@section('content')
    <div class="jumbotron py-5">
        <h1 class="display-4">Welcome to My Simple Blog</h1>
        <p class="lead">Read articles by category</p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">View All Posts</a>
    </div>

    <h3>Categories</h3>
    <div class="mb-4">
        @foreach($categories as $cat)
            <a href="{{ route('categories.show',$cat->slug) }}" class="btn btn-outline-secondary btn-sm me-1">{{ $cat->name }}</a>
        @endforeach
    </div>

    <h3>Recent Posts</h3>
    <div class="list-group">
        @foreach($recentPosts as $post)
            <a href="{{ route('posts.show',$post->slug) }}" class="list-group-item list-group-item-action">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small class="text-muted">{{ $post->category->name ?? '' }} • {{ $post->published_at?->format('M d, Y') }}</small>
                <p class="mb-1">{{ Str::limit(strip_tags($post->content), 120) }}</p>
            </a>
        @endforeach
    </div>
@endsection
