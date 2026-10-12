@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h3 class="mb-3">Edit Post</h3>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('posts._form')
    </form>
@endsection
