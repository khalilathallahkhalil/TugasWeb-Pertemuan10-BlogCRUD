@props(['post'])

<div class="card h-100 shadow-sm">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="height:180px;object-fit:cover" alt="{{ $post->title }}">
    @endif
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
        <small class="text-secondary mb-3">{{ $post->created_at->diffForHumans() }}</small>
        <div class="mt-auto d-flex gap-1">
            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-warning">Edit</a>
            {{-- [7] @csrf + @method('DELETE') --}}
            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                  onsubmit="return confirm('Hapus post ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
