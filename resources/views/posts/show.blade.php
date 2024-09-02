@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
    </div>
@endsection
