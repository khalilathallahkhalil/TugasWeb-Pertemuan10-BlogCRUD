@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <form method="GET" action="{{ route('posts.index') }}" class="input-group mb-4">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari judul / konten...">
        <button class="btn btn-dark">Cari</button>
    </form>

    <div class="row g-3">
        @forelse ($posts as $post)
            <div class="col-md-4">
                <x-card :post="$post" />
            </div>
        @empty
            <div class="col-12"><p class="text-center text-muted">Belum ada post.</p></div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection
