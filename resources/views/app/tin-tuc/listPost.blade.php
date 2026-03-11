@extends('layouts.app')

@section('content')
    <div class="row pad-2-4 list-post">
        <div class="col-lg-9">
            <div class="d-flex gap-2">
                <div class="logo">
                    <img class="w-100" src="{{ asset('icons/news.png') }}" alt="">
                </div>
                <h4 class="blue label">
                    <span>{{ $category->name }}</span>
                </h4>
            </div>
            <hr>
            @if ($posts->count() > 0)
                @foreach ($posts as $index => $post)
                    <div class="row">
                        <div class="col-lg-3 medium-thumbnails-2">
                            <img class="full-img border-10px" src="{{ Storage::url($post->thumbnail) }}" alt="">
                        </div>
                        <div class="col-lg-9">
                            <div class="font-18 blue fweight-500 ellipsis-3 pointer mb-10">
                                <span><a class="text-decor-none"
                                        href="{{ route('read', ['slug' => $post->category->slug, 'id' => $post->id, 'slugPost' => $post->slug]) }}">{{ $post->title }}</a></span>
                            </div>
                            <div class="d-flex gap-1 line-height-0 align-items-center gap-1">
                                <div class="date-logo logo">
                                    <img class="w-100" src="{{ asset('icons/calendar.png') }}" alt="">
                                </div>
                                <div class="blue fweight-500 font-16">
                                    <span>{{ $post->updated_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($index < $posts->count() - 1)
                        <hr>
                    @else
                        <div class="mb-16"></div>
                    @endif
                @endforeach
            @else
                <div>
                    <h1 class="text-danger">Không có bài viết</h1>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <div class="box bg-grey mb-15">
                <div class="label red mb-15 text-center">
                    <span>Tin tức</span>
                </div>
                <ul class="list-style-type-none">
                    <li>
                        <a @class([
                            request()->is('tin-tuc/tin-tuc-su-kien')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('tin-tuc/tin-tuc-su-kien') }}>tin tức - sự kiện</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-chuyen-mon')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('tin-tuc/hoat-dong-chuyen-mon') }}>hoạt động chuyên
                            môn</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/thong-tin-y-te')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('/tin-tuc/thong-tin-y-te') }}>thông tin y tế</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-cong-doan')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('/tin-tuc/hoat-dong-cong-doan') }}>hoạt động công
                            đoàn</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-doan-thanh-nien')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('/tin-tuc/hoat-dong-doan-thanh-nien') }}>hoạt động đoàn
                            thanh niên</a>
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
