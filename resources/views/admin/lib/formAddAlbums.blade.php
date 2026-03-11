@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('album.post.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-10">
                        <label for="title" class="form-label fw-semibold text-dark">Tiêu đề</label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="Nhập tiêu đề..." value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-10">
                        <label for="cover" class="form-label fw-semibold text-dark">Ảnh bìa album</label>
                        <input type="file" name="cover" class="form-control-file" accept="image/*" required>
                    </div>
                    <div class="form-group mb-10">
                        <label for="images" class="form-label fw-semibold text-dark">Ảnh trong album</label>
                        <input type="file" name="images[]" class="form-control-file" accept="image/*" multiple required>
                    </div>
                    <div class="form-group mb-10">
                        <fieldset>
                            <label for="slug" class="form-label fw-semibold text-dark">Trạng thái</label>
                            <div>
                                <input type="radio" id="status" name="status" value="draft" checked />
                                <label for="draft">draft</label>
                            </div>

                            <div>
                                <input type="radio" id="status" name="status" value="published" />
                                <label for="published">published</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="btn-submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
