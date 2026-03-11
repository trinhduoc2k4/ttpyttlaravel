@extends('layouts.admin');

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('thumbnail.update', $id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="form-label fw-semibold text-dark">Tiêu đề</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ $thumbnail->title }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <fieldset>
                            <label for="slug" class="form-label fw-semibold text-dark">Trạng thái</label>
                            <div>
                                <input type="radio" name="status" value="draft" @checked($thumbnail->status === 'draft') />
                                <label for="draft">draft</label>
                            </div>
                            <div>
                                <input type="radio" name="status" value="published" @checked($thumbnail->status === 'published') />
                                <label for="published">published</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label fw-semibold text-dark">Ảnh của bài viết hiện tại</label>
                        @if ($thumbnail->image)
                            <img class="thumbnails" src="{{ Storage::url($thumbnail->image) }}" alt="">
                        @endif
                        <div>
                            <label for="image" class="form-label fw-semibold text-dark">Chọn ảnh mới cho bài viết</label>
                            <div>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="btn-submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
