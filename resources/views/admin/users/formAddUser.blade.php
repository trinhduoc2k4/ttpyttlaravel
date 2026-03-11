@extends('layouts.admin');

@section('content')
    <div id="main-content">
        <div id="page-container">
            <section class="form-box">
                <form action="{{ route('user.post.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold text-dark">Tài khoản</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label fw-semibold text-dark">Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="full_name" class="form-label fw-semibold text-dark">Tên đầy đủ</label>
                        <input type="text" name="full_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label fw-semibold text-dark">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="department" class="form-label fw-semibold text-dark">Bộ phận</label>
                        <select name="department_id">
                            <option value="1">Văn phòng trung tâm</option>
                            <option value="2">Kế hoạch tổng hợp</option>
                            <option value="3">Điều dưỡng</option>
                            <option value="4">Khoa giám định</option>
                            <option value="5">Khoa khám bệnh</option>
                            <option value="6">Khoa cận lâm sàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <fieldset>
                            <label for="role" class="form-label fw-semibold text-dark">Phân quyền</label>
                            <div>
                                <input type="radio" name="role" value="department_admin" checked />
                                <label for="role">department_admin</label>
                            </div>

                            <div>
                                <input type="radio" name="role" value="superadmin" />
                                <label for="role">superadmin</label>
                            </div>

                            <div>
                                <input type="radio" name="role" value="staff" />
                                <label for="role">staff</label>
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
