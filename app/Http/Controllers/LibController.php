<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalDocuments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Support\Str;

Paginator::useBootstrapFive();

class LibController extends Controller
{
    public function index($slug)
    {
        $legalDocs = LegalDocuments::latest()->paginate(5);
        return view('admin.lib.listDocs', [
            'message' => session('message'),
            'legalDocs' => $legalDocs,
            'slug' => $slug
        ]);
    }

    public function formCreate($slug)
    {
        return view('admin.lib.formAddDocs', [
            'slug' => $slug
        ]);
    }

    public function create(Request $request, $slug)
    {
        //validate
        $file_path = null;
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $file_name = $file->getClientOriginalName();

            $file_path = $file->storeAs('legal-documents', $file_name, 'public');
        }

        LegalDocuments::create([
            'created_by' => Auth::id(),
            'title' => $request->title,
            'code' => $request->code,
            'document_type' => $request->document_type,
            'issued_date' => $request->issued_date,
            'issuer' => $request->issuer,
            'file_path' => $file_path,
            'status' => $request->status
        ]);

        return redirect()->route('lib.index', [
            'slug' => $slug
        ])->with('message', 'Thêm mới văn bản thành công!!!');
    }

    public function formEdit($slug, $id)
    {
        $legalDoc = LegalDocuments::findOrFail($id);
        return view('admin.lib.formEditDocs', [
            'legalDoc' => $legalDoc,
            'slug' => $slug,
            'id' => $id
        ]);
    }

    public function update(Request $request, $slug, $id)
    {
        $legalDoc = LegalDocuments::findOrFail($id);
        $file_path = $legalDoc->file_path;
        if ($request->hasFile('file_path')) {
            if ($file_path) {
                Storage::disk('public')->delete($file_path);
            }
            $file = $request->file('file_path');
            $file_name = $file->getClientOriginalName();

            $file_path = $file->storeAs('legal-documents', $file_name, 'public');
        }
        $legalDoc->update([
            'created_by' => Auth::id(),
            'title' => $request->title,
            'code' => $request->code,
            'document_type' => $request->document_type,
            'issued_date' => $request->issued_date,
            'issuer' => $request->issuer,
            'file_path' => $file_path,
            'status' => $request->status
        ]);
        return redirect()->route('lib.index', [
            'slug' => $slug
        ])->with('message', 'Chỉnh sửa văn bản thành công!!!');
    }

    public function delete($slug, $id)
    {
        $legalDoc = LegalDocuments::findOrFail($id);
        $legalDoc->delete();
    }

    public function albumIndex()
    {
        $albums = Album::withCount('images')
            ->latest()
            ->paginate(5);
        return view('admin.lib.listAlbums', [
            'albums' => $albums,
            'message' => session('message')
        ]);
    }

    public function formCreateAlbum()
    {
        return view('admin.lib.formAddAlbums');
    }

    public function createAlbum(Request $request)
    {
        DB::transaction(function () use ($request) {
            $album = Album::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'status' => $request->status,
                'user_id' => Auth::id(),
            ]);

            $latestImagePath = null;

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('albums', 'public');

                    AlbumImage::create([
                        'album_id' => $album->id,
                        'image_path' => $path,
                        'sort_order' => $index
                    ]);

                    $latestImagePath = $path;
                }
            }

            $album->update([
                'cover_image' => $request->hasFile('cover')
                    ? $request->file('cover')->store('albums/covers', 'public')
                    : $latestImagePath
            ]);
        });

        return redirect()->route('album.get.index')->with('message', 'Thêm mới ảnh thành công!!!');
    }

    public function deleteAlbum($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
    }
}
