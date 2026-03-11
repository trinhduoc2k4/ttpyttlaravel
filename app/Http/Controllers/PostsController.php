<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



Paginator::useBootstrapFive();

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $idCategory = $request->idCategory;
        $slug = $request->slug;
        $category = Category::findOrFail($idCategory);
        $categoryName = $category->name ?? '';
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(5);
        return view('admin.posts.listPost', [
            'message' => session('message'),
            'categoryName' => $categoryName,
            'idCategory' => $idCategory,
            'slug' => $slug,
            'posts' => $posts
        ]);
    }

    public function formCreate(Request $request)
    {
        return view('admin.posts.formAddPost', [
            'idCategory' => $request->idCategory,
            'slug' => $request->slug
        ]);
    }

    public function upload(Request $request)
    {
        $storedFilePath = null;
        $originalFilename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();
            $storedFilePath = $file->store('uploads', 'public');
            return response()->json([
                'url' => asset('storage/' . $storedFilePath)
            ]);
        }
        return "No file uploaded.";
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
            'image.required' => 'Vui lòng thêm ảnh'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => $request->filled('slugPost') ? $request->slugPost : Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $image,
            'status' => $request->status,
            'author_id' => Auth::id(),
            'category_id' => $request->idCategory
        ]);

        $idCategory = $request->idCategory;
        $slug = $request->slug;
        return redirect()->route('index', [
            'idCategory' => $idCategory,
            'slug' => $slug
        ])->with('message', 'Thêm mới bài viết thành công!!!');
    }

    public function edit(Request $request)
    {
        $post = POST::findOrFail($request->idPost);
        return view('admin.posts.formEditPost', [
            'post' => $post,
            'idCategory' => $request->idCategory,
            'idPost' => $request->idPost,
            'slug' => $request->slug
        ]);
    }

    public function update(Request $request)
    {
        $contentRaw = $request->content;
        $contentText = trim(strip_tags($contentRaw, '<img>'));
        $request->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề'
        ]);

        if (blank($contentText)) {
            return back()
                ->withErrors(['content' => 'Vui lòng nhập nội dung'])
                ->withInput();
        }

        $post = Post::findOrFail($request->idPost);
        $thumbnail = $post->thumbnail;
        if ($request->hasFile('image')) {
            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }
            $thumbnail = $request->file('image')->store('uploads', 'public');
        }
        $post->update([
            'title' => $request->title,
            'slug' => $request->slugPost,
            'content' => $request->content,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
            'author_id' => Auth::id(),
            'category_id' => $request->idCategory
        ]);
        return redirect()->route('index', [
            'idCategory' => $request->idCategory,
            'slug' => $request->slug
        ])->with('message', 'Chỉnh sửa bài viết thành công!!!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
