@extends('layouts.app')

@section('title', $category->name ?? 'Category')

@section('content')
    <h1>{{ $category->name }}</h1>

    @if($posts->count())
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($post->content),150) }}</p>
                    <a href="{{ route('posts.show',$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>No posts in this category yet.</p>
    @endif
@endsection
