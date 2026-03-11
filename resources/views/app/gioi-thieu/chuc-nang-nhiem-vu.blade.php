@extends('layouts.app')

@section('content')
    <div class="d-flex pad-2-4 gap-3 chuc-nang-nhiem-vu">
        <div class="col-lg-9">
            <div>
                <h4 class="blue label">Chức năng nhiệm vụ</h4>
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
                <p class="fw-bold">1.1. Chức năng</p>
                <p class="text-indent">Trung tâm Pháp y tâm thần khu vực Miền núi phía Bắc thực hiện giám định pháp y tâm
                    thần theo quy định
                    của pháp luật tố tụng và Luật Giám định tư pháp chủ yếu trên địa bàn các tỉnh, thành phố bao gồm: Phú
                    Thọ, Điện Biên, Lai Châu, Sơn La, Lào Cai, Yên Bái, Hà Giang, Tuyên Quang, Vĩnh Phúc (nay là: Phú Thọ,
                    Điện Biên, Sơn La, Lào Cai, Tuyên Quang) và một số tỉnh, thành phố khác; thực hiện nghiên cứu khoa học,
                    tham gia đào tạo, bồi dưỡng, hợp tác quốc tế về chuyên ngành pháp y tâm thần; khám và điều trị bệnh nhân
                    tâm thần theo quy định của pháp luật.</p>
                <p class="fw-bold">1.2. Nhiệm vụ</p>
                <p class="text-indent">1.2.1. Thực hiện giám định pháp y tâm thần:
                    Giám định pháp y tâm thần cho các trường hợp trưng cầu của cơ quan, tổ chức, cá nhân theo quy định của
                    pháp luật.
                    Giám định lại, giám định bổ sung khi có cơ quan trưng cầu, cá nhân yêu cầu giám định.
                    Giám định các trường hợp nhân chứng khi cơ quan pháp luật yêu cầu.
                    Thực hiện giám định theo yêu cầu của cá nhân, tổ chức theo quy định của pháp luật.
                    Tham gia tố tụng tại Hội đồng xét xử khi được các cơ quan pháp luật yêu cầu.</p>
                <p class="text-indent">1.2.2. Nghiên cứu khoa học, đào tạo, đào tạo bồi dưỡng và hợp tác quốc tế:
                    Chủ trì hoặc tham gia các đề tài nghiên cứu khoa học phù hợp với chức năng, nhiệm vụ được giao của Trung
                    tâm theo quy định của pháp luật.
                    Tham gia hoặc chủ trì các hội nghị chuyên môn về lĩnh vực pháp y tâm thần với các tổ chức quốc tế và các
                    tổ chức phi chính phủ để nâng cao trình độ chuyên môn nghiệp vụ cho viên chức và người lao động của
                    Trung tâm theo quy định.
                    Tổ chức đào tạo liên tục, tập huấn, bồi dưỡng trình độ cho các cán bộ chuyên ngành pháp y tâm thần theo
                    quy định của pháp luật.
                    Cử cán bộ đi học tập, bồi dưỡng trong nước và nước ngoài về nghiệp vụ chuyên môn theo thẩm quyền.</p>
                <p class="text-indent"> 1.2.3. Khám và điều trị bệnh nhân tâm thần khi có đủ điều kiện theo quy định của
                    pháp luật về khám bệnh,
                    chữa bệnh.</p>
                <p class="text-indent">1.2.4. Thực hiện công tác tổng hợp, thống kê, báo cáo, quản lý, lưu trữ thông tin
                    của đơn vị theo quy
                    định của pháp luật.</p>
                <p class="text-indent">1.2.5. Tham gia góp ý, xây dựng các văn bản quy phạm pháp luật và quy trình
                    chuyên môn về giám định pháp
                    y tâm thần.</p>
                <p class="text-indent">1.2.6. Thực hiện các nhiệm vụ khác khi được Bộ Y tế giao.</p>
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
