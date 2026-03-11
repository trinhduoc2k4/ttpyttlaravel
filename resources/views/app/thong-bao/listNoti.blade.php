@extends('layouts.app')

@section('content')
    <div class="row pad-2-4">
        <div class="col-lg-8">
            <div class="d-flex gap-2">
                <div class="logo">
                    <img class="w-100" src="{{ asset('icons/notification.png') }}" alt="">
                </div>
                <h4 class="blue label">
                    <span>Thông báo</span>
                </h4>
            </div>
            <hr>
            @if ($listNoti->count() > 0)
                @foreach ($listNoti as $index => $noti)
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="font-18 blue fweight-500 ellipsis-3 pointer mb-10">
                                <span><a class="text-decor-none black"
                                        href="{{ route('noti.detail', ['id' => $noti->id, 'slug' => $noti->category->slug]) }}">{{ $noti->title }}</a></span>
                            </div>
                            <div class="d-flex gap-1 line-height-0 align-items-center gap-1">
                                <div class="date-logo logo">
                                    <img class="w-100" src="{{ asset('icons/calendar.png') }}" alt="">
                                </div>
                                <div class="blue fweight-500 font-16">
                                    <span>{{ $noti->updated_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($index < $listNoti->count() - 1)
                        <hr>
                    @else
                        <div class="mb-16"></div>
                    @endif
                @endforeach
            @else
                <div>
                    <h3 class="text-danger text-center">Không có thông báo!!!</h3>
                </div>
            @endif
        </div>
        <div class="col-lg-4">
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
        </div>
    </div>
@endsection
