@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 van-ban-phap-luat">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Thư viện</h4>
            </div>
            <hr>
            <div class="post-header">
                <h3 class="header-title">
                    <span>Văn bản pháp luật</span>
                </h3>
            </div>
            <div class="search-box mb-20">
                <form action="{{ route('legal.search', $slug) }}" class="d-flex align-items-end gap-2" method="GET">
                    <div class="form-group col-lg-9">
                        <label class="mb-10 fw-bold">Tìm kiếm</label>
                        <input class="input-search" name="q" type="text" placeholder="Số, ký hiệu hoặc trích yếu"
                            value="{{ request('q') }}">
                    </div>
                    <div class="btn-action col-lg-3 text-center">
                        <button type="submit" class="btn btn-primary fweight-600">Tìm kiếm</button>
                        <a href="{{ route('legal.index', $slug) }}" class="btn btn-success fweight-600">Hiện tất cả</a>
                    </div>
                </form>
            </div>
            @if ($legalDocs->count() > 0)
                <div class="result-search">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 170px" class="t-head">Số ký hiệu</th>
                                <th style="width: 150px" class="t-head">Ngày ban hành</th>
                                <th class="t-head">Trích yếu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($legalDocs as $legalDoc)
                                <tr>
                                    <td><a class="text-decor-none black pointer"
                                            href="{{ route('legal.detail', ['slug' => $slug, 'id' => $legalDoc->id]) }}">{{ $legalDoc->code }}</a>
                                    </td>
                                    <td><a class="text-decor-none black pointer"
                                            href="{{ route('legal.detail', ['slug' => $slug, 'id' => $legalDoc->id]) }}">{{ $legalDoc->issued_date_formatted }}</a>
                                    </td>
                                    <td>
                                        <a class="text-decor-none black pointer"
                                            href="{{ route('legal.detail', ['slug' => $slug, 'id' => $legalDoc->id]) }}">{{ $legalDoc->title }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center text-danger">Chưa có văn bản!!!</h3>
            @endif
        </div>
        <div class="col-lg-3">
            <div class="box bg-grey mb-15">
                <div class="label red mb-15 text-center">
                    <span>Giới thiệu</span>
                </div>
                <ul class="list-style-type-none">
                    <li>
                        <a @class([
                            request()->is('thu-vien/album')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('thu-vien/album') }}>Ảnh</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('thu-vien/van-ban-phap-luat')
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
