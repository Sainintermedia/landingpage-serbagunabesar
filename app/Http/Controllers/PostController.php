<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Models\ClickToAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'cta', 'categories', 'postImage'])->latest()->paginate(10);
        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $ctas = ClickToAction::all();
        return view('dashboard.post.create', compact('categories', 'ctas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'cta_id' => 'required|exists:cta,id',
            'category_id.*' => 'exists:categories,id', // validasi kategori
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cta_id = $request->cta_id;
        $post->user_id = \Auth::user()->id;
        $post->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = $file->store('public/images'); // simpan file di direktori storage/app/public/images
                $path = Storage::url($filename); // dapatkan URL publik file

                // simpan informasi file ke database
                $image = new PostImage();
                $image->banner_image = $filename;
                $image->url = $path;
                $image->name = $file->getClientOriginalName();
                $image->post_id = $post->id; // asumsikan bahwa PostImage memiliki relasi 'post' dengan model Post
                $image->save();
            }
        }

        if ($request->has('category_id')) {
            $categories = $request->category_id;
            $post->categories()->attach($categories);
        }

        return redirect()
            ->route('post.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit($post)
    {
        $categories = Category::all();
        $ctas = ClickToAction::all();
        $post = Post::with(['user', 'cta', 'categories', 'postImage'])->find($post);
        return view('dashboard.post.edit', compact('post', 'ctas', 'categories'));
    }

    public function update(Request $request, $post)
    {
        // return $request->all();
        $post = Post::find($post);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->cta_id = $request->input('cta_id');
        $post->user_id = $request->input('user_id');
        $post->save();

        // update categories
        $post->categories()->sync($request->input('category_id'));

        // update images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = $file->store('public/images');
                $path = Storage::url($filename);

                $image = new PostImage();
                $image->banner_image = $filename;
                $image->url = $path;
                $image->name = $file->getClientOriginalName();
                $image->post_id = $post->id;
                $image->save();
            }
        }

        return redirect()
            ->route('post.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($post)
    {
        $post = Post::findOrFail($post);

        // hapus semua gambar yang terkait dengan post
        // foreach ($post->postImage as $image) {
        //     Storage::delete($image->url);
        //     $image->delete();
        // }

        // hapus post
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully.');
    }

    public function deleteImage($post)
    {
        $image = PostImage::findOrFail($post);

        if (Storage::disk('public')->exists($image->url)) {
            Storage::disk('public')->delete($image->url);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->findOrFail($post);
        $post->restore();

        return redirect()->back()->with('success', 'Post has been restored.');
    }

    public function indexSoftDeleted()
    {
        $posts = Post::onlyTrashed()->get();

        return view('dashboard.post.delete', compact('posts'));
    }

    public function deletePermanently($post)
    {
        $post = Post::onlyTrashed()->findOrFail($post);

        // hapus semua gambar yang terkait dengan post
        foreach ($post->postImage as $image) {
            Storage::delete($image->url);
            $image->delete();
        }


        // hapus post secara permanen
        $post->forceDelete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted permanently.');
    }

    public function show($post)
    {
        $post = Post::with(['user', 'cta', 'categories', 'postImage'])->find($post);
        return view('dashboard.post.show', compact('post'));
    }
}
