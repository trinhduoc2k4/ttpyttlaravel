@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 co-cau-to-chuc">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Cơ cấu tổ chức</h4>
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
                <p class="fw-bold">
                    2.1. Tổ chức bộ máy
                </p>
                <p class="text-indent"> Hiện tại, cơ cấu tổ chức bộ máy của đơn vị gồm 03 khoa và 03 phòng gồm:
                    - 03 khoa: Khoa Giám định; Khoa Khám bệnh; Khoa Cận Lâm sàng;
                    - 03 phòng chức năng: Văn phòng Trung tâm; Phòng Kế hoạch - Tổng hợp; Phòng Điều dưỡng.</p>
                <p class="fw-bold">2.2. Nguồn nhân lực</p>
                <p class="blue label">Ban lãnh đạo</p>


                <div class="swiper leader-slider">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide">
                            <div class="leader-card">
                                <img src="{{ asset('images/gd.jpg') }}" alt="">
                                <h4>Nguyễn Đức Ninh</h4>
                                <p class="position">Giám đốc Trung tâm</p>
                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center mb-8">
                                    <img class="logo-pf" src="{{ asset('icons/phone.png') }}" alt="">
                                    <p> 0912775696</p>
                                </div>

                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center">
                                    <img class="logo-pf" src="{{ asset('icons/mail.png') }}" alt="">
                                    <p> nguyenducninhpy@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div class="leader-card">
                                <img src="{{ asset('images/cvp.jpg') }}" alt="">
                                <h4>Lương Thị Lan Hương</h4>
                                <p class="position">Chánh văn phòng Trung tâm</p>
                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center mb-8">
                                    <img class="logo-pf" src="{{ asset('icons/phone.png') }}" alt="">
                                    <p> 0975035336</p>
                                </div>

                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center">
                                    <img class="logo-pf" src="{{ asset('icons/mail.png') }}" alt="">
                                    <p> huongtb94@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div class="leader-card">
                                <img src="{{ asset('images/ddt.jpg') }}" alt="">
                                <h4>Phạm Thu Hiền</h4>
                                <p class="position">Điều dưỡng trưởng Trung tâm</p>
                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center mb-8">
                                    <img class="logo-pf" src="{{ asset('icons/phone.png') }}" alt="">
                                    <p> 0963751680</p>
                                </div>

                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center">
                                    <img class="logo-pf" src="{{ asset('icons/mail.png') }}" alt="">
                                    <p> thuhien021982@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div class="leader-card">
                                <img src="{{ asset('images/pcvp.jpg') }}" alt="">
                                <h4>Nguyễn Ngọc Quý Lâm</h4>
                                <p class="position">Phó Chánh văn phòng Trung tâm</p>
                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center mb-8">
                                    <img class="logo-pf" src="{{ asset('icons/phone.png') }}" alt="">
                                    <p> 0986109738</p>
                                </div>

                                <div class="d-flex line-height-0 align-items-center gap-1 justify-content-center">
                                    <img class="logo-pf" src="{{ asset('icons/mail.png') }}" alt="">
                                    <p> quylam0201@gmail.com</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <p class="text-indent">Trung tâm được giao 67 người làm việc và 10 lao động hợp đồng theo Quyết định số
                    186/QĐ-BYT ngày 13/01/2025
                    của Bộ trưởng Bộ Y tế về việc giao số lượng người làm việc và số lượng lao động hợp đồng trong các đơn
                    vị sự
                    nghiệp tự bảo đảm một phần chi thường xuyên và đơn vị sự nghiệp công lập do ngân sách nhà nước bảo đảm
                    chi
                    thường xuyên trực thuộc Bộ Y tế và thuộc các Cục thuộc Bộ Y tế năm 2025.
                    Căn cứ số lượng người được giao, Trung tâm đã tổ chức tuyển dụng người làm việc đáp ứng nhu cầu công
                    việc
                    tại đơn vị. Hiện nay số lượng người làm việc có mặt tại đơn vị là 50 viên chức và 07 lao động hợp đồng
                    theo
                    Nghị định 111/2022/NĐ-CP của Chính Phủ.
                    Tháng 05/2025 Trung tâm có 01 viên chức bác sĩ xin thôi việc vì lý do cá nhân.
                    Tháng 06/2025 có 03 viên chức của Trung tâm bị Cơ quan cảnh sát điều tra công an thành phố Hà Nội khởi
                    tố,
                    bắt tạm giam. Hiện 03 đồng chí này đang tạm đình chỉ công tác theo quy định.
                    Tháng 12/2025 Trung tâm tiếp nhận 01 viên chức bác sĩ, giám định viên công tác tại Bệnh viện tâm thần
                    Phú
                    Thọ đến làm việc tại Trung tâm.
                    Về trình độ chuyên môn: 05 Bác sỹ (CKI: 04; Đại học: 01); 27 Điều dưỡng (CKI: 02, Đại học: 10, Cao đẳng:
                    15); Kỹ thuật y hạng IV: 04; Dược hạng IV: 01; Dược sĩ: 01; Chuyên viên: 04, Kế toán viên: 05, Kỹ sư
                    CNTT:
                    02, Văn thư: 01 và Nhân viên hợp đồng: 07.
                    Số lượng giám định viên: hiện đơn vị có 04 giám định viên.
                    Đội ngũ cán bộ lãnh đạo quản lý của Trung tâm gồm: 01 Phụ trách Điều hành, 06 trưởng, phó trưởng
                    khoa/phòng
                    và 03 điều dưỡng trưởng khoa và tương đương.</p>
                <div class="carousel-wrapper">
                    <div id="mainCarousel" class="carousel slide">

                        <!-- indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"
                                aria-current="true"></button>
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"
                                aria-current="true"></button>
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"
                                aria-current="true"></button>
                            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"
                                aria-current="true"></button>
                        </div>

                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/vptt.jpg') }}" class="d-block w-100 carousel-img">
                                <div class="carousel-caption">
                                    <h4>Văn phòng trung tâm</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/khth.jpg') }}" class="d-block w-100 carousel-img">
                                <div class="carousel-caption">
                                    <h4>Kế hoạch tổng hợp</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/dd.jpg') }}" class="d-block w-100 carousel-img">
                                <div class="carousel-caption">
                                    <h4>Điều dưỡng</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/cls.jpg') }}" class="d-block w-100 carousel-img">
                                <div class="carousel-caption">
                                    <h4>Cận lâm sàng</h4>
                                </div>
                            </div>
                        </div>

                        <!-- controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>

                <p class="fw-bold">3. Cơ sở hạ tầng</p>
                <p class="text-indent">
                    Trung tâm hiện nay có tổng diện tích khuôn viên 2.489,0 m2, gồm có 03 tòa nhà bao gồm:
                    - Tòa nhà Khoa Giám định: Công năng sử dụng bao gồm phòng bệnh nhân, khoa Giám định, phòng Giám định;
                    Khoa
                    Khám bệnh và khu vực đón tiếp; Phòng Điều dưỡng; phòng trực, phòng thăm gặp.
                    - Tòa nhà Nghiệp vụ I: Công năng sử dụng bao gồm phòng lãnh đạo Trung tâm, phòng Kế hoạch - Tổng hợp,
                    Văn
                    phòng Trung tâm và khoa Cận lâm sàng.
                    - Nhà dinh dưỡng Trung tâm: Công năng sử dụng bao gồm nhà bếp, căng tin phục vụ bệnh nhân, phòng ăn cho
                    cán
                    bộ và phòng ăn tiếp khách.
                    - Hiện Trung tâm có 34 phòng lưu giữ đối tượng giám định, được thiết kế không có các ổ điện trong phòng,
                    lắp
                    đặt camera theo dõi 24/24 bao gồm: 1 hệ thống camera tổng, 5 đầu ghi, 42 mắt camera, 3 màn hình quan
                    sát.
                </p>
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
