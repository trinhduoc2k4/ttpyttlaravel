@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('album.get.create') }}">Tạo
                        mới album ảnh</a>
                </div>
            </div>
            <div>
                <h1 class="text-center text-danger">{{ $message ?? '' }}</h1>
            </div>
            @if ($albums->total() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ảnh bìa</th>
                            <th scope="col">Số lượng ảnh trong album</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <th scope="row" class="text-center">{{ $album->id }}</th>
                                <td scope="row" class="text-center">{{ $album->title }}</td>
                                <td scope="row" class="text-center"><img class="thumbnails"
                                        src="{{ Storage::url($album->cover_image) }}" alt=""></td>
                                <td scope="row" class="text-center">{{ $album->images_count }}</td>
                                <td class="text-center">
                                    <div class="{{ $album->status === 'draft' ? 'text-danger' : 'text-primary' }}">
                                        {{ $album->status }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{-- <a href="{{ route('album.edit', $album->id) }}">
                                            <img class="icon" src="{{ asset('icons/edit.png') }}" alt=""></a> --}}
                                        <a class="btn-delete" href="#"
                                            data-url="{{ route('album.delete', $album->id) }}"><img class="icon"
                                                src="{{ asset('icons/delete.png') }}" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $albums->links() }}
                </div>
            @else
                <h1 class="text-center text-danger">Không có album ảnh nào!!!</h1>
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
