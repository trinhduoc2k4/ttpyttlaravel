<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Thumbnail;
use App\Models\LegalDocuments;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $categories = Category::whereIn('slug', [
            'tin-tuc-su-kien',
            'hoat-dong-chuyen-mon',
            'thong-tin-y-te',
            'hoat-dong-cong-doan',
            'hoat-dong-doan-thanh-nien',
            'thong-bao'
        ])->with(['posts' => function ($q) {
            $q->where('status', 'published')->latest()->take(5);
        }])->get()->keyBy('slug');
        $thumbnails = Thumbnail::where('status', 'published')->get();
        $legalDocs = LegalDocuments::where('status', 'published')->orderBy('id', 'desc')->take(5)->get();
        return view('app.home', [
            'thumbnails' => $thumbnails,
            'categories' => $categories,
            'legalDocs' => $legalDocs
        ]);
    }

    public function gioiThieu($slug)
    {
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();
        return view('app.gioi-thieu.' . $slug, [
            'listNoti' => $listNoti
        ]);
    }

    public function giamDinhPYTT($slug)
    {
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();
        return view('app.giam-dinh-pytt.' . $slug, [
            'listNoti' => $listNoti
        ]);
    }

    public function vanBan($slug)
    {
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();

        switch ($slug) {
            case config('global.phap-luat'):
                $legalDocs = LegalDocuments::where('status', 'published')
                    ->orderBy('id', 'desc')
                    ->get();
                return view('app.thu-vien.van-ban-phap-luat', [
                    'legalDocs' => $legalDocs,
                    'slug' => $slug,
                    'listNoti' => $listNoti
                ]);

            case config('global.noi-bo'):
                return view('app.thu-vien.van-ban-noi-bo', [
                    'slug' => $slug
                ]);

            default:
                abort(404);
        }
    }

    public function vanBanDetail($slug, $id)
    {
        $legalDoc = LegalDocuments::findOrFail($id);
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();

        return view('app.thu-vien.van-ban-phap-luat-detail', [
            'legalDoc' => $legalDoc,
            'listNoti' => $listNoti
        ]);
    }

    public function legalDocSearch(Request $request, $slug)
    {
        $q = $request->q;
        $legalDocs = LegalDocuments::where('status', 'published')
            ->where(function ($query) use ($q) {
                $query->where('code', 'like', "%$q%")
                    ->orWhere('title', 'like', "%$q%");
            })
            ->orderBy('id', 'desc')
            ->get();

        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();

        return view('app.thu-vien.van-ban-phap-luat', [
            'legalDocs' => $legalDocs,
            'slug' => $slug,
            'listNoti' => $listNoti
        ]);
    }

    public function listPost($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->get();
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();
        return view('app.tin-tuc.listPost', [
            'posts' => $posts,
            'category' => $category,
            'listNoti' => $listNoti
        ]);
    }

    public function detailPost($slug, $id, $slugPost)
    {
        $post = Post::with('category')->findOrFail($id);

        $sessionKey = 'post_viewed_' . $post->id;
        if (!session()->has($sessionKey)) {
            $post->increment('views');
            session()->put($sessionKey, true);
        }

        if ($post->category->slug !== $slug) {
            abort(404);
        }

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest()
            ->limit(5)
            ->get();

        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();

        return view('app.tin-tuc.detailPost', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'slug' => $slug,
            'listNoti' => $listNoti
        ]);
    }

    public function listNoti()
    {
        $category = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $category->posts;
        return view('app.thong-bao.listNoti', [
            'listNoti' => $listNoti
        ]);
    }

    public function detailNoti($id, $slug)
    {
        $noti = Post::with('category')->findOrFail($id);

        $sessionKey = 'noti_viewed_' . $noti->id;
        if (!session()->has($sessionKey)) {
            $noti->increment('views');
            session()->put($sessionKey, true);
        }
        if ($noti->category->slug !== $slug) {
            abort(404);
        }

        $relatedNotis = Post::where('category_id', $noti->category_id)
            ->where('id', '!=', $noti->id)
            ->where('status', 'published')
            ->latest()
            ->limit(5)
            ->get();
        return view('app.thong-bao.detailNoti', [
            'noti' => $noti,
            'relatedNotis' => $relatedNotis
        ]);
    }

    public function listAlbum()
    {
        $albums = Album::with('images')->where('status', 'published')->get();
        $categoryNoti = Category::with(['posts' => function ($q) {
            $q->where('status', 'published')
                ->latest();
        }])
            ->whereSlug('thong-bao')
            ->first();
        $listNoti = $categoryNoti->posts ?? collect();

        return view('app.thu-vien.album', [
            'albums' => $albums,
            'listNoti' => $listNoti
        ]);
    }
}
