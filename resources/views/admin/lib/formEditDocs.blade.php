@extends('layouts.admin');

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('lib.update', ['slug' => $slug, 'id' => $id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-10">
                        <label for="title" class="form-label fw-semibold text-dark">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề..."
                            value="{{ $legalDoc->title }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-10">
                        <label for="code" class="form-label fw-semibold text-dark">Số ký hiệu</label>
                        <input type="text" name="code" class="form-control" placeholder="Nhập số ký hiệu..."
                            value="{{ $legalDoc->code }}">
                    </div>
                    <div class="form-group mb-10">
                        <label for="document_type" class="form-label fw-semibold text-dark">Loại văn bản</label>
                        <select name="document_type">
                            <option value="Luật"
                                {{ old('document_type', $legalDoc->document_type) == 'Luật' ? 'selected' : '' }}>Luật
                            </option>
                            <option value="Quyết định"
                                {{ old('document_type', $legalDoc->document_type) == 'Quyết định' ? 'selected' : '' }}>Quyết
                                định</option>
                            <option value="Thông tư"
                                {{ old('document_type', $legalDoc->document_type) == 'Thông tư' ? 'selected' : '' }}>Thông
                                tư</option>
                            <option value="Nghị định"
                                {{ old('document_type', $legalDoc->document_type) == 'Nghị định' ? 'selected' : '' }}>Nghị
                                định</option>
                            <option value="Chỉ thị"
                                {{ old('document_type', $legalDoc->document_type) == 'Chỉ thị' ? 'selected' : '' }}>Chỉ thị
                            </option>
                            <option value="Nghị quyết"
                                {{ old('document_type', $legalDoc->document_type) == 'Nghị quyết' ? 'selected' : '' }}>Nghị
                                quyết</option>
                        </select>
                    </div>
                    <div class="form-group mb-10">
                        <label for="issued_date" class="form-label fw-semibold text-dark">Ngày ban hành</label>
                        <input type="date" name="issued_date" value="{{ $legalDoc->issued_date }}">
                    </div>
                    <div class="form-group mb-10">
                        <label for="issuer" class="form-label fw-semibold text-dark">Cơ quan ban hành</label>
                        <input type="text" name="issuer" class="form-control" placeholder="Nhập cơ quan ban hành..."
                            value="{{ $legalDoc->issuer }}">
                    </div>
                    <div class="form-group mb-10">
                        <fieldset>
                            <label for="slug" class="form-label fw-semibold text-dark">Trạng thái</label>
                            <div>
                                <input type="radio" id="status" name="status" value="draft"
                                    @checked($legalDoc->status === 'draft') />
                                <label for="draft">draft</label>
                            </div>

                            <div>
                                <input type="radio" id="status" name="status" value="published"
                                    @checked($legalDoc->status === 'published') />
                                <label for="published">published</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group mb-10">
                        <label class="form-label fw-semibold text-dark">File đã upload</label>
                        @if ($legalDoc->file_path)
                            <span class="text-primary">
                                {{ basename($legalDoc->file_path) }}
                            </span>
                            <a href="{{ asset('storage/' . $legalDoc->file_path) }}" target="_blank">
                                Xem / Tải
                            </a>
                        @endif
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
