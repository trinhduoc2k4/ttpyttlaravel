@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('post.create', ['slug' => $slug, 'idCategory' => $idCategory]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label fw-semibold text-dark">Tiêu đề</label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="Nhập tiêu đề..." value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug" class="form-label fw-semibold text-dark">Đường dẫn</label>
                        <input type="text" name="slugPost" id="slug" class="form-control"
                            placeholder="Nhập đường dẫn...">
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="content" class="form-label fw-semibold text-dark">Nội dung</label>
                        <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label fw-semibold text-dark">Ảnh</label>
                        <div>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="btn-submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#content').summernote({
                height: 300,
                placeholder: 'Nhập nội dung...',
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                let data = new FormData();
                data.append('file', file);
                data.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route('upload') }}',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#content').summernote('insertImage', res.url);
                    }
                });
            }
        });
    </script>
@endsection
