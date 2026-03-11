<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

Paginator::useBootstrapFive();


class ThumbnailsController extends Controller
{
    public function index()
    {
        $thumbnails = Thumbnail::orderBy('id', 'desc')->paginate(5);
        return view('admin.thumbnails.listThumbnail', [
            'thumbnails' => $thumbnails,
            'message' => session('message')
        ]);
    }

    public function formCreate()
    {
        return view('admin.thumbnails.formAddThumbnail');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'image.required' => 'Vui lòng thêm ảnh'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads', 'public');
        }

        Thumbnail::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $image,
            'status' => $request->status,
            'image' => $image,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('thumbnail.index')->with('message', 'Thêm mới ảnh thành công!!!');
    }

    public function formEdit($id)
    {
        $thumbnail = Thumbnail::findOrFail($id);
        return view('admin.thumbnails.formEditThumbnail', [
            'thumbnail' => $thumbnail,
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề'
        ]);
        $thumbnail = Thumbnail::findOrFail($id);
        $image = $thumbnail->image;
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::disk('public')->delete($image);
            }
            $image = $request->file('image')->store('uploads', 'public');
        }
        $thumbnail->update([
            'title' => $request->title,
            'image' => $image,
            'status' => $request->status,
            'author_id' => Auth::id()
        ]);
        return redirect()->route('thumbnail.index')->with('message', 'Chỉnh sửa ảnh thành công!!!');
    }

    public function delete($id)
    {
        $thumbnail = Thumbnail::findOrFail($id);
        $thumbnail->delete();
    }
}
