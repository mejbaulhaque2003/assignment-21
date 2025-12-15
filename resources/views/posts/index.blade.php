@extends('layouts.app')

@section('title','Posts')

@section('content')
    <h1>All Posts</h1>
    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name ?? '' }} • {{ $post->published_at?->format('M d, Y') }}</h6>
                <p class="card-text">{{ Str::limit(strip_tags($post->content),150) }}</p>
                <a href="{{ route('posts.show',$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection
