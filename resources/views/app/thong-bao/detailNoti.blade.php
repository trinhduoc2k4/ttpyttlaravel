@extends('layouts.app')

@section('content')
    <div class="row pad-2-4 thong-bao">
        <div class="col-lg-8">
            <div class="d-flex gap-2">
                <div class="logo">
                    <img class="w-100" src="{{ asset('icons/news.png') }}" alt="">
                </div>
                <h4 class="blue label">
                    <span>thông báo</span>
                </h4>
            </div>
            <hr>
            <div class="noi-dung">
                <div class="post-header">
                    <h3 class="header-title">
                        <span>{{ $noti->title }}</span>
                    </h3>
                </div>
                <div class="post-time mb-20">
                    <div class="d-flex gap-1 line-height-0 align-items-center gap-1">
                        <div class="date-logo logo">
                            <img class="w-100" src="{{ asset('icons/clock.png') }}" alt="">
                        </div>
                        <div class="blue fweight-500 font-16">
                            <span>{{ $noti->updated_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="post-view">
                            ({{ $noti->views }} lượt xem)
                        </div>
                    </div>
                </div>
                <div class="mb-20">
                    <p>{!! $noti->content !!}</p>
                </div>
            </div>
            <div class="cac-bai-khac">
                <div class="font-18 yellow fweight-700">
                    <span>Các thông báo khác</span>
                </div>
                <hr>
                @if ($relatedNotis->count() > 0)
                    @foreach ($relatedNotis as $relatedNoti)
                        <ul>
                            <li class="font-16 fweight-400 mb-10 ml-list">
                                <span><a class="text-decor-none pointer"
                                        href="{{ route('noti.detail', ['id' => $relatedNoti->id, 'slug' => $relatedNoti->category->slug]) }}">{{ $relatedNoti->title }}</a></span>
                            </li>
                        </ul>
                    @endforeach
                @else
                    <h3 class="text-center text-danger">Chưa có thông báo nào!!!</h3>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
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
        </div>
    </div>
@endsection
