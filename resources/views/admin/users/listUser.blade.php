@extends('layouts.admin');

@section('content')
    <div id="main-content">
        <div id="page-container">
            <div>
                <h1 class="text-center">Người dùng</h1>
                <div class="d-flex justify-content-end">
                    <a type="button" class="btn btn-primary" href="{{ route('user.get.create') }}">Tạo mới người dùng</a>
                </div>
            </div>
            <div>
                <h1>{{ $message ?? '' }}</h1>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">STT</th>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Phân quyền</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a class="{{ Auth::id() === $user->id || Auth::user()->role === $user->role ? 'btn-delete disabled-link' : 'btn-delete' }}"
                                    href="#" data-url="{{ route('user.delete', $user->id) }}"><img class="icon"
                                        src="{{ asset('icons/delete.png') }}" alt="" disabled></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links() }}
            </div>
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
