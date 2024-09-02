@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        @if ($posts->count() > 0)
            <div class="list-group">
                @foreach ($posts as $post)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        <div>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No posts available.</p>
        @endif
    </div>
@endsection
