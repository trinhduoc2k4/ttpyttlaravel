    @extends('layouts.app')

    @section('content')
        {{-- carousel anh --}}
        <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">

            <!-- indicators -->
            <div class="carousel-indicators">
                @foreach ($thumbnails as $key => $thumbnail)
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $key }}"
                        class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}"></button>
                @endforeach
            </div>

            <!-- slides -->
            <div class="carousel-inner">
                @foreach ($thumbnails as $key => $thumbnail)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ Storage::url($thumbnail->image) }}" class="d-block w-100"
                            alt="Slide {{ $key + 1 }}">
                    </div>
                @endforeach
            </div>

            <!-- controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <section class="home pad-2-4">
            <div class="marquee-wrapper">
                <div class="marquee marquee-1">
                    <span>CHÀO MỪNG XUÂN BÍNH NGỌ 2026!!!</span>
                </div>

                <div class="marquee marquee-2">
                    <span>CHÚC MỪNG NĂM MỚI – AN KHANG THỊNH VƯỢNG!!!</span>
                </div>
            </div>
            {{-- tin noi bat --}}

            <section class="tin-noi-bat mb-30">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="d-flex gap-2">
                            <div class="logo">
                                <img class="w-100" src="{{ asset('icons/news.png') }}" alt="">
                            </div>
                            <h4 class="blue label">
                                <span>Tin tức - sự kiện</span>
                            </h4>
                        </div>
                        <hr>
                        @if (isset($categories['tin-tuc-su-kien']) && $categories['tin-tuc-su-kien']->posts->count() > 0)
                            @php
                                $postsTTSK = $categories['tin-tuc-su-kien']->posts;
                                $mainPostTTSK = $postsTTSK->first();
                                $subPostsTTSK = $postsTTSK->skip(1)->take(3);
                            @endphp
                            <div class="tieu-diem">
                                <div class="d-flex">
                                    <div class="col-lg-8 pr-3">
                                        @if ($mainPostTTSK)
                                            <div class="big-thumbnails mb-10">
                                                <img class="border-10px w-100 h-100"
                                                    src="{{ Storage::url($mainPostTTSK->thumbnail) }}" alt="">
                                            </div>
                                            <div class="font-18 text-uppercase fweight-700 pointer mb-10">
                                                <span>
                                                    <a class="text-decor-none"
                                                        href="{{ route('read', ['slug' => config('global.tin-tuc'), 'id' => $mainPostTTSK->id, 'slugPost' => $mainPostTTSK->slug]) }}">{{ $mainPostTTSK->title }}</a>
                                                </span>
                                            </div>
                                            <div class="d-flex gap-1 line-height-0 align-items-center mb-15">
                                                <div class="date-logo logo">
                                                    <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="fweight-500 font-16 blue">
                                                    <span>{{ $mainPostTTSK->updated_at->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="font-16 fweight-400 text-start ellipsis-3">
                                                <span>
                                                    {!! $mainPostTTSK->content !!}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <ul class="danh-sach-tieu-diem list-style-type-none col-lg-4">
                                        @foreach ($subPostsTTSK as $index => $subPostTTSK)
                                            <li>
                                                <div class="d-flex gap-2">
                                                    <div class="small-thumbnails col-lg-5">
                                                        <img class="border-6px full-img"
                                                            src="{{ Storage::url($subPostTTSK->thumbnail) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="tieu-diem-title">
                                                        <div
                                                            class="text-uppercase font-16 fweight-600 pointer break-word ellipsis-2 mb-10">
                                                            <span><a class="text-decor-none black"
                                                                    href="{{ route('read', ['slug' => config('global.tin-tuc'), 'id' => $subPostTTSK->id, 'slugPost' => $subPostTTSK->slug]) }}">{{ $subPostTTSK->title }}</a></span>
                                                        </div>
                                                        <div class="date d-flex gap-1 line-height-0 align-items-center">
                                                            <div class="date-logo logo">
                                                                <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blue font-16 fweight-500">
                                                                <span>{{ $subPostTTSK->updated_at->format('d/m/Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if ($index <= $subPostsTTSK->count() - 1)
                                                <hr>
                                            @else
                                                @if ($postsTTSK->count() > 4)
                                                    <div class="read-more">
                                                        <a class="text-decor-none pointer font-18 fweight-500 blue"
                                                            href="{{ route('list', config('global.tin-tuc')) }}">Xem
                                                            thêm</a>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                    {{-- @if ($postsTTSK->count() > 1)
                                        <div class="mobile-only">
                                            <a class="text-decor-none pointer font-18 fweight-500 blue"
                                                href="{{ route('list', config('global.tin-tuc')) }}">Xem
                                                thêm</a>
                                        </div>
                                    @endif --}}
                                </div>
                            </div>
                        @else
                            <h3 class="text-danger text-center">Chưa có bài viết!!!</h3>
                        @endif
                    </div>
                    <div class="thong-bao col-lg-3">
                        <div class="panel-thong-bao mb-20">
                            <div class="box">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="logo">
                                        <img style="width: 100%" src="{{ asset('icons/notification.png') }}"
                                            alt="">
                                    </div>
                                    <div class="label red">
                                        <span>Thông báo</span>
                                    </div>
                                </div>
                                <hr>
                                @if (isset($categories['thong-bao']) && $categories['thong-bao']->posts->count() > 0)
                                    @php
                                        $getPostTB = $categories['thong-bao']->posts;
                                        $postsTB = $getPostTB->take(2);
                                    @endphp
                                    <div class="danh-sach-thong-bao">
                                        <ul class="list-style-type-none">
                                            @foreach ($postsTB as $index => $postTB)
                                                <li class="d-flex align-items-center gap-1">
                                                    <div>
                                                        <img class="logo" src="{{ asset('icons/click-clicking.gif') }}"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <div class="font-16 fweight-600 pointer mb-10">
                                                            <span>
                                                                <a class="text-decor-none black pointer ellipsis-2"
                                                                    href="{{ route('noti.detail', ['id' => $postTB->id, 'slug' => $postTB->category->slug]) }}">{{ $postTB->title }}</a>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex gap-1 line-height-0 align-items-center">
                                                            <div class="date-logo logo">
                                                                <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blue font-16 fweight-500">
                                                                <span>{{ $postTB->updated_at->format('d/m/Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @if ($index < $postsTB->count() - 1)
                                                    <hr>
                                                @else
                                                    @if ($getPostTB->count() > 2)
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
                                    <h3 class="text-danger text-center">Chưa có thông báo!!!</h3>
                                @endif
                            </div>
                            <div class="tel-thong-bao">

                            </div>
                        </div>
                        <div class="panel-van-ban">
                            <div class="box">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="logo">
                                        <img style="width: 100%" src="{{ asset('icons/law.jpg') }}" alt="">
                                    </div>
                                    <div class="label red">
                                        <span>văn bản pháp luật</span>
                                    </div>
                                </div>
                                <hr>
                                @if (isset($legalDocs) && $legalDocs->count() > 0)
                                    @php
                                        $subLegalDocs = $legalDocs->take(2);
                                    @endphp
                                    @foreach ($subLegalDocs as $index => $subLegalDoc)
                                        <div class="danh-sach-thong-bao">
                                            <ul class="list-style-type-none">
                                                <li class="d-flex align-items-center gap-1">
                                                    <div>
                                                        <img class="logo" src="{{ asset('icons/click-clicking.gif') }}"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <div class="font-16 fweight-600 pointer mb-10">
                                                            <span><a class="text-decor-none black ellipsis-2"
                                                                    href="{{ route('legal.detail', ['slug' => config('global.phap-luat'), 'id' => $subLegalDoc->id]) }}">{{ $subLegalDoc->title }}</a>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex line-height-0 align-items-center gap-1">
                                                            <div class="date-logo logo">
                                                                <img class="w-100"
                                                                    src="{{ asset('icons/calendar.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blue font-16 fweight-500">
                                                                <span>{{ $subLegalDoc->issued_date_formatted }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @if ($index < $subLegalDocs->count() - 1)
                                                    <hr>
                                                @else
                                                    @if ($legalDocs->count() > 2)
                                                        <div class="read-more">
                                                            <a class="text-decor-none pointer font-18 fweight-500 blue"
                                                                href="{{ route('legal.index', config('global.phap-luat')) }}">Xem
                                                                thêm</a>
                                                        </div>
                                                    @else
                                                        <div class="mb-16"></div>
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                @else
                                    <h3 class="text-center text-danger">Chưa có văn bản!!!</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- hoat dong chuyen mon - thong tin y te --}}
            <section class="hoat-dong-chuyen-mon-thong-tin-y-te mb-20">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex gap-2">
                            <div class="logo">
                                <img class="w-100" src="{{ asset('icons/medical.png') }}" alt="">
                            </div>
                            <h4 class="blue label">
                                <span>hoạt động chuyên môn</span>
                            </h4>
                        </div>
                        <hr>
                        @if (isset($categories['hoat-dong-chuyen-mon']) && $categories['hoat-dong-chuyen-mon']->posts->count() > 0)
                            @php
                                $postsHDCM = $categories['hoat-dong-chuyen-mon']->posts;
                                $mainPostHDCM = $postsHDCM->first();
                                $subPostsHDCM = $postsHDCM->skip(1)->take(2);
                            @endphp
                            <div class="hoat-dong-chuyen-mon-detail d-flex gap-3 mb-30">
                                @if ($mainPostHDCM)
                                    <div class="col-lg-6 medium-thumbnails">
                                        <img class="full-img border-10px"
                                            src="{{ Storage::url($mainPostHDCM->thumbnail) }}" alt="">
                                    </div>
                                    <div>
                                        <div class="font-18 blue fweight-500 pointer mb-10 ellipsis-2">
                                            <span><a class="text-decor-none"
                                                    href="{{ route('read', ['slug' => config('global.chuyen-mon'), 'id' => $mainPostHDCM->id, 'slugPost' => $mainPostHDCM->slug]) }}">{{ $mainPostHDCM->title }}</a></span>
                                        </div>
                                        <div class="d-flex line-height-0 align-items-center mb-15 gap-1">
                                            <div class="date-logo logo">
                                                <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="blue font-16 fweight-500">
                                                <span>{{ $mainPostHDCM->updated_at->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="font-16 fweight-400 ellipsis-3">
                                            <span>{!! $mainPostHDCM->content !!}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="list-hoat-dong-chuyen-mon">
                                <ul class="list-style-type-none d-flex gap-4">
                                    @foreach ($subPostsHDCM as $subPostHDCM)
                                        <li class="d-flex gap-2" style="flex: 0 0 calc(50% - 25px);">
                                            <div class="col-lg-5 small-thumbnails">
                                                <img class="border-6px full-img"
                                                    src="{{ Storage::url($subPostHDCM->thumbnail) }}" src=""
                                                    alt="">
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="font-16 fweight-500 ellipsis-2 pointer mb-10">
                                                    <span><a class="text-decor-none pointer black"
                                                            href="{{ route('read', ['slug' => config('global.chuyen-mon'), 'id' => $subPostHDCM->id, 'slugPost' => $subPostHDCM->slug]) }}">{{ $subPostHDCM->title }}</a></span>
                                                </div>
                                                <div class="d-flex line-height-0 align-items-center gap-1">
                                                    <div class="date-logo logo">
                                                        <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="blue font-16 fweight-500">
                                                        <span>{{ $subPostHDCM->updated_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @if ($postsHDCM->count() > 3)
                                    <div class="read-more">
                                        <a class="text-decor-none pointer font-18 fweight-500 blue"
                                            href="{{ route('list', config('global.chuyen-mon')) }}">Xem
                                            thêm</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <h3 class="text-danger text-center">Chưa có bài viết!!!</h3>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex gap-2">
                            <div class="logo">
                                <img class="w-100" src="{{ asset('icons/medical.png') }}" alt="">
                            </div>
                            <h4 class="blue label">
                                <span>thông tin y tế</span>
                            </h4>
                        </div>
                        <hr>
                        @if (isset($categories['thong-tin-y-te']) && $categories['thong-tin-y-te']->posts->count() > 0)
                            @php
                                $postsTTYT = $categories['thong-tin-y-te']->posts;
                                $mainPostTTYT = $postsTTYT->first();
                                $subPostsTTYT = $postsTTYT->skip(1)->take(2);
                            @endphp
                            <div class="thong-tin-y-te-detail d-flex mb-30 gap-3">
                                @if ($mainPostTTYT)
                                    <div class="col-lg-6 medium-thumbnails">
                                        <img class="full-img border-10px"
                                            src="{{ Storage::url($mainPostTTYT->thumbnail) }}" alt="">
                                    </div>
                                    <div>
                                        <div class="font-18 blue fweight-500 mb-10 ellipsis-2 pointer">
                                            <span><a class="text-decor-none"
                                                    href="{{ route('read', ['slug' => config('global.y-te'), 'id' => $mainPostTTYT->id, 'slugPost' => $mainPostTTYT->slug]) }}">{{ $mainPostTTYT->title }}</a></span>
                                        </div>
                                        <div class="d-flex line-height-0 align-items-center mb-15 gap-1">
                                            <div class="date-logo logo">
                                                <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="blue font-16 fweight-500">
                                                <span>{{ $mainPostTTYT->updated_at->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="font-16 fweight-400 ellipsis-3">
                                            <span>{!! $mainPostTTYT->content !!}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="list-thong-tin-y-te">
                                <ul class="list-style-type-none d-flex f-wrap gap-4">
                                    @foreach ($subPostsTTYT as $subPostTTYT)
                                        <li class="d-flex gap-2" style="flex: 0 0 calc(50% - 25px);">
                                            <div class="col-lg-5 small-thumbnails">
                                                <img class="border-6px full-img"
                                                    src="{{ Storage::url($subPostTTYT->thumbnail) }}" src=""
                                                    alt="">
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="font-16 fweight-500 ellipsis-2 pointer mb-10">
                                                    <span><a class="text-decor-none pointer black"
                                                            href="{{ route('read', ['slug' => config('global.y-te'), 'id' => $subPostTTYT->id, 'slugPost' => $subPostTTYT->slug]) }}">{{ $subPostTTYT->title }}</a></span>
                                                </div>
                                                <div class="d-flex line-height-0 align-items-center gap-1">
                                                    <div class="date-logo logo">
                                                        <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="blue font-16 fweight-500">
                                                        <span>{{ $subPostTTYT->updated_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @if ($postsTTYT->count() > 3)
                                    <div class="read-more">
                                        <a class="text-decor-none pointer font-18 fweight-500 blue"
                                            href="{{ route('list', config('global.y-te')) }}">Xem
                                            thêm</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <h3 class="text-danger text-center">Chưa có bài viết!!!</h3>
                        @endif
                    </div>
                </div>
            </section>
            {{-- hoat dong cong doan - hoat dong doan thanh nien --}}
            <section>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel-lien-ket">
                            <div class="box">
                                <div class="d-flex justify-content-center align-items-center gap-2 mb-16">
                                    <div class="logo">
                                        <img style="width: 100%" src="{{ asset('icons/lienket.png') }}" alt="">
                                    </div>
                                    <div class="label red">
                                        <span>Liên kết</span>
                                    </div>
                                </div>
                                <div class="danh-sach-thong-bao">
                                    <ul class="list-style-type-none">
                                        <li class="mb-10">
                                            <a href="https://moh.gov.vn/" target="blank"><img
                                                    style="width: 100%; height: 80px"
                                                    src="{{ asset('images/boyte.jpg') }}" alt=""></a>
                                        </li>
                                        <li class="mb-10">
                                            <a href="https://www.moj.gov.vn/Pages/home.aspx" target="blank"><img
                                                    style="width: 100%; height: 80px"
                                                    src="{{ asset('images/botuphap.jpg') }}" alt=""></a>
                                        </li>
                                        <li class="mb-10">
                                            <a href="https://congdoanytevn.org.vn/" target="blank"><img
                                                    style="width: 100%; height: 80px"
                                                    src="{{ asset('images/congdoanyte.png') }}" alt=""></a>
                                        </li>
                                        <li class="mb-10">
                                            <a href="https://dichvucong.gov.vn/p/home/dvc-trang-chu.html"
                                                target="blank"><img style="width: 100%; height: 80px"
                                                    src="{{ asset('images/congdichvucong.png') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="https://mst.gov.vn/" target="blank"><img
                                                    style="width: 100%; height: 80px"
                                                    src="{{ asset('images/bokhoahoccongnghe.png') }}" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex gap-2">
                            <div class="logo">
                                <img class="w-100" src="{{ asset('images/cd.png') }}" alt="">
                            </div>
                            <h4 class="blue label">
                                <span>hoạt động công đoàn</span>
                            </h4>
                        </div>
                        <hr>
                        @if (isset($categories['hoat-dong-cong-doan']) && $categories['hoat-dong-cong-doan']->posts->count() > 0)
                            @php
                                $postsHDCD = $categories['hoat-dong-cong-doan']->posts;
                                $subPostsHDCD = $postsHDCD->take(3);
                            @endphp
                            <div class="list-hoat-dong-cong-doan">
                                <ul class="list-style-type-none">
                                    @foreach ($subPostsHDCD as $subPostHDCD)
                                        <li class="d-flex gap-2 mb-30">
                                            <div class="col-lg-2 small-thumbnails">
                                                <img class="border-6px full-img"
                                                    src="{{ Storage::url($subPostHDCD->thumbnail) }}" src=""
                                                    alt="">
                                            </div>
                                            <div>
                                                <div class="font-16 fweight-500 ellipsis-2 pointer mb-10">
                                                    <span><a class="text-decor-none black pointer"
                                                            href="{{ route('read', ['slug' => config('global.cong-doan'), 'id' => $subPostHDCD->id, 'slugPost' => $subPostHDCD->slug]) }}">{{ $subPostHDCD->title }}</a></span>
                                                </div>
                                                <div class="d-flex line-height-0 align-items-center gap-1">
                                                    <div class="date-logo logo">
                                                        <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="blue font-16 fweight-500">
                                                        <span>{{ $subPostHDCD->updated_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @if ($postsHDCD->count() > 3)
                                    <div class="read-more">
                                        <a class="text-decor-none pointer font-18 fweight-500 blue"
                                            href="{{ route('list', config('global.cong-doan')) }}">Xem
                                            thêm</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <h3 class="text-danger text-center">Chưa có bài viết!!!</h3>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex gap-2">
                            <div class="logo">
                                <img class="w-100" src="{{ asset('images/dtn.png') }}" alt="">
                            </div>
                            <h4 class="blue label">
                                <span>hoạt động đoàn thanh niên</span>
                            </h4>
                        </div>
                        <hr>
                        @if (isset($categories['hoat-dong-doan-thanh-nien']) && $categories['hoat-dong-doan-thanh-nien']->posts->count() > 0)
                            @php
                                $postsHDDTN = $categories['hoat-dong-doan-thanh-nien']->posts;
                                $subPostsHDDTN = $postsHDDTN->take(3);
                            @endphp
                            <div class="list-hoat-dong-doan-thanh-nien">
                                <ul class="list-style-type-none">
                                    @foreach ($subPostsHDDTN as $subPostHDDTN)
                                        <li class="d-flex gap-2 mb-30">
                                            <div class="col-lg-2 small-thumbnails">
                                                <img class="border-6px full-img"
                                                    src="{{ Storage::url($subPostHDDTN->thumbnail) }}" src=""
                                                    alt="">
                                            </div>
                                            <div>
                                                <div class="font-16 fweight-500 ellipsis-2 pointer mb-10">
                                                    <span><a class="text-decor-none black pointer"
                                                            href="{{ route('read', ['slug' => config('global.doan-thanh-nien'), 'id' => $subPostHDDTN->id, 'slugPost' => $subPostHDDTN->slug]) }}">{{ $subPostHDDTN->title }}</a></span>
                                                </div>
                                                <div class="d-flex line-height-0 align-items-center gap-1">
                                                    <div class="date-logo logo">
                                                        <img class="w-100" src="{{ asset('icons/calendar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="blue font-16 fweight-500">
                                                        <span>{{ $subPostHDDTN->updated_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @if ($postsHDDTN->count() > 3)
                                    <div class="read-more">
                                        <a class="text-decor-none pointer font-18 fweight-500 blue"
                                            href="{{ route('list', config('global.doan-thanh-nien')) }}">Xem
                                            thêm</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <h3 class="text-danger text-center">Chưa có bài viết!!!</h3>
                        @endif
                    </div>
                </div>
            </section>
        </section>
    @endsection
