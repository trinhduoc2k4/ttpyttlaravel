@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('lib.get.create', ['slug' => $slug]) }}">Tạo
                        mới văn bản</a>
                </div>
            </div>
            <div>
                <h1 class="text-center text-danger">{{ $message ?? '' }}</h1>
            </div>
            @if ($legalDocs->total() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">Trích yếu</th>
                            <th scope="col">Số ký hiệu</th>
                            <th scope="col">Loại văn bản</th>
                            <th scope="col">Ngày ban hành</th>
                            <th scope="col">Cơ quan ban hành</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($legalDocs as $legalDoc)
                            <tr>
                                <th scope="row" class="text-center">{{ $legalDoc->id }}</th>
                                <td scope="row">{{ $legalDoc->title }}</td>
                                <td scope="row">{{ $legalDoc->code }}</td>
                                <td scope="row">{{ $legalDoc->document_type }}</td>
                                <td scope="row">{{ $legalDoc->issued_date_formatted }}</td>
                                <td scope="row">{{ $legalDoc->issuer }}</td>
                                <td class="text-center">
                                    <div class="{{ $legalDoc->status === 'draft' ? 'text-danger' : 'text-primary' }}">
                                        {{ $legalDoc->status }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('lib.edit', ['slug' => $slug, 'id' => $legalDoc->id]) }}">
                                            <img class="icon" src="{{ asset('icons/edit.png') }}" alt=""></a>
                                        <a class="btn-delete" href="#"
                                            data-url="{{ route('lib.delete', ['slug' => $slug, 'id' => $legalDoc->id]) }}"><img
                                                class="icon" src="{{ asset('icons/delete.png') }}" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $legalDocs->links() }}
                </div>
            @else
                <h1 class="text-center text-danger">Không có văn bản pháp luật nào!!!</h1>
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
