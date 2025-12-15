@extends('layouts.app')

@section('title',$post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Category: <a href="{{ route('categories.show',$post->category->slug) }}">{{ $post->category->name }}</a> • Author: {{ $post->user->name }} • {{ $post->published_at?->format('M d, Y') }}</p>
    <div>{!! $post->content !!}</div>

    <hr>
    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>

    <h4 class="mt-4">More posts from this category</h4>
    <ul>
        @foreach($more as $m)
            <li><a href="{{ route('posts.show',$m->slug) }}">{{ $m->title }}</a></li>
        @endforeach
    </ul>
@endsection
