@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <div>
                <h1 class="text-center">{{ Str::upper($categoryName) }}</h1>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary"
                        href="{{ route('get.create', ['slug' => $slug, 'idCategory' => $idCategory]) }}">Tạo
                        mới bài viết</a>
                </div>
            </div>
            <div>
                <h1 class="text-center text-danger">{{ $message ?? '' }}</h1>
            </div>
            @if ($posts->total() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Đường dẫn</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row" class="text-center">{{ $post->id }}</th>
                                <td scope="row">{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td class="text-center">
                                    <img class="thumbnails" src="{{ Storage::url($post->thumbnail) }}" alt="">
                                </td>
                                {{-- <td>{!! $post->content !!}</td> --}}
                                <td class="text-center">
                                    <span>Bấm vào sửa bài viết
                                        để xem chi tiết nội dung</span>
                                </td>
                                <td class="text-center">
                                    <div class="{{ $post->status === 'draft' ? 'text-danger' : 'text-primary' }}">
                                        {{ $post->status }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a
                                            href="{{ route('edit', ['slug' => $slug, 'idCategory' => $idCategory, 'idPost' => $post->id]) }}">
                                            <img class="icon" src="{{ asset('icons/edit.png') }}" alt=""></a>
                                        <a class="btn-delete" href="#"
                                            data-url="{{ route('delete', $post->id) }}"><img class="icon"
                                                src="{{ asset('icons/delete.png') }}" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $posts->links() }}
                </div>
            @else
                <h1 class="text-center text-danger">Không có bài viết!!</h1>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                let url = $(this).data('url');

                if (!confirm('Bạn có chắc muốn xóa?')) return;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        let rowCount = $('tbody tr').length;
                        if (rowCount === 1) {
                            let page = new URLSearchParams(window.location.search).get(
                                'page') || 1;
                            if (page > 1) {
                                alert('Xóa thành công!!');
                                window.location.href = '?page=' + (page - 1);
                            } else {
                                location.reload();
                                alert('Xóa thành công!!');
                            }
                        } else {
                            location.reload();
                            alert('Xóa thành công!!');
                        }
                    },
                    error: function() {
                        alert('Xóa thất bại');
                    }
                });
            })
        });
    </script>
@endsection
