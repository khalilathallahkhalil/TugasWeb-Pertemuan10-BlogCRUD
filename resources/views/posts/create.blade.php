@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
    <h3 class="mb-3">Tambah Post</h3>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('posts._form')
    </form>
@endsection
