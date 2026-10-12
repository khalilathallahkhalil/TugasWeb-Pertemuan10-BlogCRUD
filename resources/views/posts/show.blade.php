@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="card shadow-sm">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height:350px;object-fit:cover">
        @endif
        <div class="card-body">
            <h2>{{ $post->title }}</h2>
            <p class="text-muted">{{ $post->created_at->format('d M Y H:i') }}</p>
            <p style="white-space:pre-line">{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Kembali</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
        </div>
    </article>
@endsection
