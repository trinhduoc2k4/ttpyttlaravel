@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 album">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Thư viện</h4>
            </div>
            <hr>
            <div class="post-header">
                <h3 class="header-title">
                    <span>Ảnh</span>
                </h3>
            </div>
            @if ($albums->count() > 0)
                <ul class="d-flex list-style-type-none gap-3 f-wrap">
                    @foreach ($albums as $index => $album)
                        <li class="album-lg gallery-item">
                            @foreach ($album->images as $image)
                                <a href="{{ Storage::url($image->image_path) }}">
                                    <img src="{{ Storage::url($image->image_path) }}"
                                        class="{{ $loop->first ? '' : 'd-none' }}">

                                    @if ($loop->first)
                                        <span class="image-title">{{ $album->title }}</span>
                                    @endif

                                </a>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            @else
                <h3 class="text-center text-danger">Chưa có album ảnh!!!</h3>
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
                                                <div class="blue fweight-500 font-16 ">
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>s
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.gallery-item').forEach(function(el) {
                lightGallery(el, {
                    selector: 'a',
                    speed: 600,
                    download: true,
                    fullScreen: true,
                    thumbnail: true,
                    plugins: [
                        lgZoom,
                        lgFullscreen,
                        lgThumbnail
                    ],
                    actualSize: true,
                    animateThumb: false,
                    zoomFromOrigin: false,
                    allowMediaOverlap: true,
                    toggleThumb: true
                });
            });
        });
    </script>
@endpush
