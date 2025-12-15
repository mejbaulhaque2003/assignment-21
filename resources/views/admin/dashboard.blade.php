@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Total Categories</h5>
                    <p class="display-6">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Total Posts</h5>
                    <p class="display-6">{{ $totalPosts }}</p>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Manage Categories</a>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Manage Posts</a>
    <form class="d-inline" method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-link">Logout</button></form>
@endsection
@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="list-group">
        <a class="list-group-item" href="{{ route('admin.categories.index') }}">Manage Categories</a>
        <a class="list-group-item" href="{{ route('admin.posts.index') }}">Manage Posts</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="list-group-item btn btn-link text-start">Logout</button></form>
    </div>
@endsection
