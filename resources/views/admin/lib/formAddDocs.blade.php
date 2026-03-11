@extends('layouts.admin');

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('lib.post.create', ['slug' => $slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-10">
                        <label for="title" class="form-label fw-semibold text-dark">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề..."
                            value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-10">
                        <label for="code" class="form-label fw-semibold text-dark">Số ký hiệu</label>
                        <input type="text" name="code" class="form-control" placeholder="Nhập số ký hiệu...">
                    </div>
                    <div class="form-group mb-10">
                        <label for="document_type" class="form-label fw-semibold text-dark">Loại văn bản</label>
                        <select name="document_type">
                            <option value="Luật">Luật</option>
                            <option value="Quyết định">Quyết định</option>
                            <option value="Thông tư">Thông tư</option>
                            <option value="Nghị định">Nghị định</option>
                            <option value="Chỉ thị">Chỉ thị</option>
                            <option value="Nghị quyết">Nghị quyết</option>
                        </select>
                    </div>
                    <div class="form-group mb-10">
                        <label for="issued_date" class="form-label fw-semibold text-dark">Ngày ban hành</label>
                        <input type="date" name="issued_date">
                    </div>
                    <div class="form-group mb-10">
                        <label for="issuer" class="form-label fw-semibold text-dark">Cơ quan ban hành</label>
                        <input type="text" name="issuer" class="form-control" placeholder="Nhập cơ quan ban hành...">
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
                    <div class="form-group mb-10">
                        <label for="file_path" class="form-label fw-semibold text-dark">File</label>
                        <input type="file" name="file_path">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="btn-submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
