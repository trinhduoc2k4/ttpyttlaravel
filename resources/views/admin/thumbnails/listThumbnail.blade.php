@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <div>
                <h1 class="text-center">Ảnh</h1>
                <div class="d-flex justify-content-end">
                    <a type="button" class="btn btn-primary" href="{{ route('thumbnail.get.create') }}">Tạo mới ảnh</a>
                </div>
            </div>
            <div>
                <h1>{{ $message ?? '' }}</h1>
            </div>
            @if ($thumbnails->total() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thumbnails as $thumbnail)
                            <tr>
                                <th scope="row" class="text-center">{{ $thumbnail->id }}</th>
                                <td>{{ $thumbnail->title }}</td>
                                <td class="text-center"><img class="thumbnails" src="{{ Storage::url($thumbnail->image) }}"
                                        alt=""></td>
                                <td class="text-center">
                                    <div class="{{ $thumbnail->status === 'draft' ? 'text-danger' : 'text-primary' }}">
                                        {{ $thumbnail->status }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn-edit" href="{{ route('thumbnail.edit', $thumbnail->id) }}"> <img
                                                class="icon" src="{{ asset('icons/edit.png') }}" alt=""></a></a>
                                        <a class="btn-delete" href="#"
                                            data-url="{{ route('thumbnail.delete', $thumbnail->id) }}"><img class="icon"
                                                src="{{ asset('icons/delete.png') }}" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $thumbnails->links() }}
                </div>
            @else
                <h1 class="text-center text-danger">Không có ảnh!!!</h1>
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
