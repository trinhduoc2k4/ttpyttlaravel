<header class="text-center header-site">
    <div class="menu-overlay">
        {{-- <img src="{{ asset('icons/x.jpg') }}" class="medium-logo close-icon" alt=""> --}}
    </div>
    <div class="logo-site d-flex justify-content-between align-items-center pad-2-4 gap-2">
        <div class="main-logo-site">
            <a href="/">
                <img src="{{ asset('images/iconPYTT.jpg') }}" alt="icon">
            </a>
        </div>
        <div class="logo-content">
            <h1 class="top-logo-content">
                <span>BỘ Y TẾ</span>
            </h1>
            <span>TRUNG TÂM PHÁP Y TÂM THẦN KHU VỰC MIỀN NÚI PHÍA BẮC</span>
            <br>
            <span>(PSYCHIATRIC FORENSIC MEDICINE CENTER FOR THE NORTHERN MOUNTAINOUS REGION)</span>
        </div>
        <div class="d-flex align-items-center gap-2 hot-line">
            <div class="logo">
                <img class="w-100" src="{{ asset('icons/phone.png') }}" alt="">
            </div>
            <span>Hotline: <b> 0210 626 2966</b></span>
        </div>
    </div>
    <div class="nav-site d-flex justify-content-between pad-1-4 align-items-center">
        <div class="selection-site">
            <ul class="nav gap-4">
                <li class=""><a href="/" @class([
                    Route::is('home') ? 'actived font-18 fweight-500' : 'font-18 fweight-500',
                ])>TRANG CHỦ</a></li>
                <li class="menu-parent"><a href="#" @class([
                    request()->is('gioi-thieu/*')
                        ? 'actived font-18 fweight-500 d-flex gap-2'
                        : 'font-18 fweight-500 d-flex gap-2',
                ])>GIỚI THIỆU
                        <div class="small-logo">
                            <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                        </div>
                    </a>
                    <ul class="menu-child">
                        <li><a class="font-16 fweight-500" href={{ url('gioi-thieu/lich-su-hinh-thanh') }}>Lịch sử
                                hình
                                thành</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('gioi-thieu/chuc-nang-nhiem-vu') }}>Chức năng
                                nhiệm vụ</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('gioi-thieu/co-cau-to-chuc') }}>Cơ cấu tổ
                                chức</a></li>
                    </ul>
                </li>
                <li class="menu-parent "><a href="#" @class([
                    request()->is('giam-dinh-pytt/*')
                        ? 'actived font-18 fweight-500 d-flex gap-2'
                        : 'font-18 fweight-500 d-flex gap-2',
                ])>GIÁM ĐỊNH PYTT
                        <div class="small-logo">
                            <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                        </div>
                    </a>
                    <ul class="menu-child">
                        <li><a class="font-16 fweight-500" href={{ url('giam-dinh-pytt/dan-su') }}>Dân sự</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('giam-dinh-pytt/hinh-su') }}>Hình sự</a></li>
                    </ul>
                </li>
                <li class="menu-parent "><a href="#" @class([
                    request()->is('tin-tuc/*')
                        ? 'actived font-18 fweight-500 d-flex gap-2'
                        : 'font-18 fweight-500 d-flex gap-2',
                ])>TIN TỨC
                        <div class="small-logo">
                            <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                        </div>
                    </a>
                    <ul class="menu-child">
                        <li><a class="font-16 fweight-500" href={{ url('tin-tuc/tin-tuc-su-kien') }}>Tin tức - sự
                                kiện</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('tin-tuc/hoat-dong-chuyen-mon') }}>Hoạt động
                                chuyên môn</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('/tin-tuc/thong-tin-y-te') }}>Thông tin y
                                tế</a>
                        </li>
                        <li><a class="font-16 fweight-500" href={{ url('/tin-tuc/hoat-dong-cong-doan') }}>Hoạt động
                                công đoàn</a></li>
                        <li><a class="font-16 fweight-500" href={{ url('/tin-tuc/hoat-dong-doan-thanh-nien') }}>Hoạt
                                động đoàn thanh niên</a></li>
                    </ul>
                </li>
                <li class="menu-parent "><a href="#" @class([
                    request()->is('thu-vien/*')
                        ? 'actived font-18 fweight-500 d-flex gap-2'
                        : 'font-18 fweight-500 d-flex gap-2',
                ])>THƯ VIỆN
                        <div class="small-logo">
                            <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                        </div>
                    </a>
                    <ul class="menu-child">
                        <li><a class="font-16 fweight-500" href={{ url('thu-vien/album') }}>Ảnh</a>
                        </li>
                        <li><a class="font-16 fweight-500" href={{ url('thu-vien/van-ban-phap-luat') }}>Văn bản
                                pháp
                                luật</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="search-site d-flex align-items-center gap-2">
            {{-- <div class="search logo">
                <img class="w-100" src="{{ asset('icons/search2.png') }}" alt="">
            </div> --}}
            <div class="current-time font-20 fweight-600 white">
                <span>{{ now_vn() }}</span>
            </div>
        </div>
        <div class="list">
            <img src="{{ asset('icons/list.png') }}" class="medium-logo" alt="">
        </div>
    </div>
    <div class="selection-site-mobile">
        <ul class="nav gap-4">
            <li class=""><a href="/" @class([
                Route::is('home') ? 'actived font-14 fweight-500' : 'font-14 fweight-500',
            ])>TRANG CHỦ</a></li>
            <li class="menu-parent"><a href="#" @class([
                request()->is('gioi-thieu/*')
                    ? 'actived font-14 fweight-500 d-flex justify-content-between'
                    : 'font-14 fweight-500 d-flex justify-content-between',
            ])>GIỚI THIỆU
                    <div class="small-logo">
                        <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                    </div>
                </a>
                <ul class="menu-child">
                    <li><a class="font-12 fweight-500" href={{ url('gioi-thieu/lich-su-hinh-thanh') }}>Lịch sử
                            hình
                            thành</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('gioi-thieu/chuc-nang-nhiem-vu') }}>Chức năng
                            nhiệm vụ</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('gioi-thieu/co-cau-to-chuc') }}>Cơ cấu tổ
                            chức</a></li>
                </ul>
            </li>
            <li class="menu-parent "><a href="#" @class([
                request()->is('giam-dinh-pytt/*')
                    ? 'actived font-14 fweight-500 d-flex justify-content-between'
                    : 'font-14 fweight-500 d-flex justify-content-between',
            ])>GIÁM ĐỊNH PYTT
                    <div class="small-logo">
                        <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                    </div>
                </a>
                <ul class="menu-child">
                    <li><a class="font-12 fweight-500" href={{ url('giam-dinh-pytt/dan-su') }}>Dân sự</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('giam-dinh-pytt/hinh-su') }}>Hình sự</a></li>
                </ul>
            </li>
            <li class="menu-parent "><a href="#" @class([
                request()->is('tin-tuc/*')
                    ? 'actived font-14 fweight-500 d-flex justify-content-between'
                    : 'font-14 fweight-500 d-flex justify-content-between',
            ])>TIN TỨC
                    <div class="small-logo">
                        <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                    </div>
                </a>
                <ul class="menu-child">
                    <li><a class="font-12 fweight-500" href={{ url('tin-tuc/tin-tuc-su-kien') }}>Tin tức - sự
                            kiện</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('tin-tuc/hoat-dong-chuyen-mon') }}>Hoạt động
                            chuyên môn</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('/tin-tuc/thong-tin-y-te') }}>Thông tin y
                            tế</a>
                    </li>
                    <li><a class="font-12 fweight-500" href={{ url('/tin-tuc/hoat-dong-cong-doan') }}>Hoạt động
                            công đoàn</a></li>
                    <li><a class="font-12 fweight-500" href={{ url('/tin-tuc/hoat-dong-doan-thanh-nien') }}>Hoạt
                            động đoàn thanh niên</a></li>
                </ul>
            </li>
            <li class="menu-parent "><a href="#" @class([
                request()->is('thu-vien/*')
                    ? 'actived font-14 fweight-500 d-flex justify-content-between'
                    : 'font-14 fweight-500 d-flex justify-content-between',
            ])>THƯ VIỆN
                    <div class="small-logo">
                        <img class="w-100" src="{{ asset('icons/icondropdown.png') }}" alt="">
                    </div>
                </a>
                <ul class="menu-child">
                    <li><a class="font-12 fweight-500" href={{ url('thu-vien/album') }}>Ảnh</a>
                    </li>
                    <li><a class="font-12 fweight-500" href={{ url('thu-vien/van-ban-phap-luat') }}>Văn bản
                            pháp
                            luật</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>
