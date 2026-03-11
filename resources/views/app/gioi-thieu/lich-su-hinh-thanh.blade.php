@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 lich-su-hinh-thanh">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Lịch sử hình thành</h4>
            </div>
            <hr>
            <div class="post-header">
                <h3 class="header-title">
                    <span>Giới thiệu chung</span>
                </h3>
            </div>
            <div class="post-time mb-20">
                <div class="d-flex gap-1 line-height-0 align-items-center gap-1">
                    <div class="date-logo logo">
                        <img class="w-100" src="{{ asset('icons/clock.png') }}" alt="">
                    </div>
                    <div class="blue fweight-500 font-16">
                        <span>14/01/2026</span>
                    </div>
                </div>
            </div>
            <div class="post-content">
                <p class="text-indent">
                    Trung tâm Pháp y tâm thần khu vực Miền núi phía Bắc được thành lập ngày 26 tháng 02 năm 2015 theo Quyết
                    định
                    số 676/QĐ-BYT của Bộ Y tế trên cơ sở Trung tâm giám định pháp y Tâm thần tỉnh Phú Thọ, đi vào hoạt động
                    chính thức từ ngày 01 tháng 7 năm 2015. Trung tâm được tổ chức và hoạt động theo Quy chế Tổ chức và hoạt
                    động ban hành kèm theo Quyết định số 4536/QĐ-BYT ngày 19/12/2023 của Bộ Y tế.
                </p>
                <div class="mb-20 h-500">
                    <img class="border-10px w-100 h-100" src="{{ asset('images/cq.jpg') }}" alt="">
                    <p class="text-center font-18">Cán bộ công viên chức người lao động trung tâm</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box bg-grey mb-15">
                <div class="label red mb-15 text-center">
                    <span>Giới thiệu</span>
                </div>
                <ul class="list-style-type-none">
                    <li>
                        <a @class([
                            request()->is('gioi-thieu/lich-su-hinh-thanh')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('gioi-thieu/lich-su-hinh-thanh') }}>lịch sử hình
                            thành</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('gioi-thieu/chuc-nang-nhiem-vu')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('gioi-thieu/chuc-nang-nhiem-vu') }}>chức năng nhiệm
                            vụ</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('gioi-thieu/co-cau-to-chuc')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('gioi-thieu/co-cau-to-chuc') }}>cơ cấu tổ chức</a>
                    </li>
                </ul>
            </div>
            <div class="panel-thong-bao">
                <div class="box">
                    <div class="d-flex justify-content-center align-items-center mb-15 gap-2">
                        <div class="logo">
                            <img style="width: 100%" src="{{ asset('icons/notification.png') }}" alt="">
                        </div>
                        <div class="label red">
                            <span>Thông báo</span>
                        </div>
                    </div>
                    @if ($listNoti->count() > 0)
                        @php
                            $getListNoti = $listNoti->take(2);
                        @endphp
                        <div class="danh-sach-thong-bao">
                            <ul class="list-style-type-none">
                                @foreach ($getListNoti as $index => $noti)
                                    <li class="d-flex align-items-center gap-1">
                                        <div>
                                            <img class="logo" src="{{ asset('icons/click-clicking.gif') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <div class="font-16 fweight-600 pointer mb-10">
                                                <span><a class="text-decor-none black pointer ellipsis-2"
                                                        href="{{ route('noti.detail', ['id' => $noti->id, 'slug' => $noti->category->slug]) }}">{{ $noti->title }}</a></span>
                                            </div>
                                            <div class="d-flex line-height-0 align-items-center gap-1">
                                                <div class="date-logo logo">
                                                    <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="blue fweight-500 font-16">
                                                    <span>{{ $noti->updated_at->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if ($index < $getListNoti->count() - 1)
                                        <hr>
                                    @else
                                        @if ($listNoti->count() > 2)
                                            <div class="read-more">
                                                <a class="text-decor-none pointer font-18 fweight-500 blue"
                                                    href="{{ route('noti.index') }}">Xem
                                                    thêm</a>
                                            </div>
                                        @else
                                            <div class="mb-16"></div>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <h3 class="text-center text-danger">Chưa có thông báo!!!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
