@extends('layouts.app')

@section('content')
    <div class="row pad-2-4 detail-post">
        <div class="col-lg-9">
            <div class="d-flex gap-2">
                <div class="logo">
                    <img class="w-100" src="{{ asset('icons/news.png') }}" alt="">
                </div>
                <h4 class="blue label">
                    <span>tin tức sự kiện</span>
                </h4>
            </div>
            <hr>
            <div class="noi-dung">
                <div class="post-header">
                    <h3 class="header-title">
                        <span>{{ $post->title }}</span>
                    </h3>
                </div>
                <div class="post-time mb-20">
                    <div class="d-flex gap-1 line-height-0 align-items-center gap-1">
                        <div class="date-logo logo">
                            <img class="w-100" src="{{ asset('icons/clock.png') }}" alt="">
                        </div>
                        <div class="blue fweight-500 font-16">
                            <span>{{ $post->updated_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="post-view">
                            ({{ $post->views }} lượt xem)
                        </div>
                    </div>
                </div>
                <div class="mb-20">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
            <div class="cac-bai-khac">
                <div class="font-18 yellow fweight-700">
                    <span>Các bài khác</span>
                </div>
                <hr>
                @if ($relatedPosts->count() > 0)
                    @foreach ($relatedPosts as $relatedPost)
                        <ul>
                            <li class="font-16 fweight-400 mb-10 ml-list">
                                <span><a class="text-decor-none pointer"
                                        href="{{ route('read', ['slug' => $slug, 'id' => $relatedPost->id, 'slugPost' => $relatedPost->slug]) }}">{{ $relatedPost->title }}</a></span>
                            </li>
                        </ul>
                    @endforeach
                @else
                    <h3 class="text-center text-danger">Chưa có bài viết nào!!!</h3>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box bg-grey mb-15">
                <div class="label red mb-15 text-center">
                    <span>Tin tức</span>
                </div>
                <ul class="list-style-type-none">
                    <li>
                        <a @class([
                            request()->is('tin-tuc/tin-tuc-su-kien*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('tin-tuc/tin-tuc-su-kien') }}>tin tức - sự kiện</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-chuyen-mon*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('tin-tuc/hoat-dong-chuyen-mon') }}>hoạt động chuyên
                            môn</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/thong-tin-y-te*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('/tin-tuc/thong-tin-y-te') }}>thông tin y tế</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-cong-doan*')
                                ? 'text-uppercase text-decor-none fweight-700 actived'
                                : 'text-uppercase text-decor-none fweight-700',
                        ]) href={{ url('/tin-tuc/hoat-dong-cong-doan') }}>hoạt động công
                            đoàn</a>
                    </li>
                    <hr>
                    <li>
                        <a @class([
                            request()->is('tin-tuc/hoat-dong-doan-thanh-nien*')
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
