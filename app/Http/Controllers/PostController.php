<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// [2] Resource controller: 7 method
class PostController extends Controller
{
    private function rules(): array
    {
        return [
            'title'   => 'required|string|min:5|max:150',
            'content' => 'required|string|min:20',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    private function messages(): array
    {
        return [
            'title.required'   => 'Judul wajib diisi.',
            'title.min'        => 'Judul minimal 5 karakter.',
            'title.max'        => 'Judul maksimal 150 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.min'      => 'Konten minimal 20 karakter.',
            'image.image'      => 'File harus berupa gambar.',
            'image.mimes'      => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'        => 'Ukuran gambar maksimal 2 MB.',
        ];
    }

    // GET /posts  (+ bonus pencarian, [8] pagination)
    public function index(Request $request)
    {
        $posts = Post::query()
            ->when($request->q, function ($query, $q) {
                $query->where(function ($w) use ($q) {
                    $w->where('title', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    // GET /posts/create
    public function create()
    {
        return view('posts.create');
    }

    // POST /posts
    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('posts', 'public');
            }
            Post::create($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan post.');
        }

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
    }

    // GET /posts/{post}  -- [8] Route Model Binding
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // GET /posts/{post}/edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // PUT/PATCH /posts/{post}
    public function update(Request $request, Post $post)
    {
        $data = $request->validate($this->rules(), $this->messages());

        try {
            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }
                $data['image'] = $request->file('image')->store('posts', 'public');
            }
            $post->update($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui post.');
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post berhasil diperbarui.');
    }

    // DELETE /posts/{post}  (soft delete)
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus post.');
        }

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
