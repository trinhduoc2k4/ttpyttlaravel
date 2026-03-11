@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 van-ban-phap-luat-detail">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Thư viện</h4>
            </div>
            <hr>
            <div class="post-header">
                <h3 class="header-title">
                    <span>Chi tiết văn bản</span>
                </h3>
            </div>
            <div class="vanban-content">
                <div class="row font-18">
                    <div class="col-lg-3 fweight-500 mb-20">Số văn bản:</div>
                    <div class="col-lg-9">{{ $legalDoc->code }}</div>
                    <div class="col-lg-3 fweight-500 mb-20">Ngày ban hành:</div>
                    <div class="col-lg-9">{{ $legalDoc->issued_date_formatted }}</div>
                    <div class="col-lg-3 fweight-500 mb-20">Trích yếu:</div>
                    <div class="col-lg-9">{{ $legalDoc->title }}</div>
                    <div class="col-lg-3 fweight-500 mb-20">Phân loại:</div>
                    <div class="col-lg-9">{{ $legalDoc->document_type }}</div>
                    <div class="col-lg-3 fweight-500 mb-20">Cơ quan ban hành:</div>
                    <div class="col-lg-9">{{ $legalDoc->issuer }}</div>
                    <div class="col-lg-3 fweight-500 mb-20">File đính kèm:</div>
                    <div class="col-lg-9"><a href="{{ asset('storage/' . $legalDoc->file_path) }}" target="_blank">
                            {{ basename($legalDoc->file_path) }}
                        </a></div>
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
                            request()->is('thu-vien/van-ban-noi-bo*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('thu-vien/van-ban-noi-bo') }}>Văn bản nội bộ</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('thu-vien/van-ban-phap-luat*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('thu-vien/van-ban-phap-luat') }}>Văn bản pháp luật</a>
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
