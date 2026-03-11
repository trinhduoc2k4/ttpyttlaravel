<footer>
    <div class="d-flex bg-blue pad-2-4 justify-content-between">
        <div class="col-lg-4 footer-info">
            <div class="top-panel">
                <div class="text-uppercase white font-18 fweight-600 mb-15">
                    <span>TRUNG TÂM PHÁP Y TÂM THẦN KHU VỰC MIỀN NÚI PHÍA BẮC</span>
                </div>
                <div class="white font-16 fweight-500 d-flex f-column gap-1 mb-30">
                    <span>Địa chỉ: 68 Cao Bang, Âu Cơ, tỉnh Phú Thọ</span>
                    <span>Điện thoại: 0210 626 2966</span>
                    <span>Email: ttgdpyttphutho@gmail.com</span>
                </div>
                <div>
                    <span class="grey font-16 fweight-500">Copyright 2026 © Trung tâm Pháp y tâm thần Khu vực miền núi
                        Phía Bắc</span>
                </div>
            </div>
        </div>
        <div class="footer-navi col-lg-2">
            <div class="text-uppercase white font-18 fweight-700 mb-15">
                <span>Giới thiệu</span>
            </div>
            <ul class="white font-16 fweight-500">
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('gioi-thieu/lich-su-hinh-thanh') }}>Lịch sử hình
                        thành</a></li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('gioi-thieu/chuc-nang-nhiem-vu') }}>Chức năng nhiệm vụ</a></li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('gioi-thieu/co-cau-to-chuc') }}>Cơ cấu tổ chức</a></li>
            </ul>
        </div>
        <div class="footer-navi col-lg-2">
            <div class="text-uppercase white font-18 fweight-700 mb-15">
                <span>Tin tức</span>
            </div>
            <ul class="white font-16 fweight-500">
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('tin-tuc/tin-tuc-su-kien') }}>Tin tức - sự
                        kiện</a></li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('tin-tuc/hoat-dong-chuyen-mon') }}>Hoạt động chuyên môn</a>
                </li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('/tin-tuc/thong-tin-y-te') }}>Thông tin y tế</a></li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('/tin-tuc/hoat-dong-cong-doan') }}>Hoạt động công đoàn</a></li>
                <li class="mb-4p ml-list"><a class="white pointer text-decor-none"
                        href={{ url('/tin-tuc/hoat-dong-doan-thanh-nien') }}>Hoạt động đoàn thanh niên</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 footer-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3714.8345040444824!2d105.21363307432982!3d21.39642008034651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31349a7ede76bacf%3A0x8a89c73b2b5e50c4!2zVHJ1bmcgdMOibSBQaMOhcCB5IFTDom0gdGjhuqduIEtodSB24buxYyBNaeG7gW4gbsO6aSBwaMOtYSBC4bqvYw!5e0!3m2!1svi!2s!4v1768015442126!5m2!1svi!2s"
                width="100%" height="200px" style="border-radius:10px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</footer>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const nav = document.querySelector('.nav-site');
        const navTop = nav.offsetTop;
        const menuBtn = document.querySelector('.list');
        const selectionSite = document.querySelector('.selection-site-mobile');
        const overlay = document.querySelector('.menu-overlay');

        window.addEventListener('scroll', () => {
            if (window.scrollY > navTop) {
                nav.classList.add('fixed');
            } else {
                nav.classList.remove('fixed');
            }
        });

        menuBtn.addEventListener('click', () => {
            selectionSite.classList.add('show');
            overlay.classList.add('show');

            document.body.classList.add('no-scroll');
        });

        overlay.addEventListener('click', () => {
            selectionSite.classList.remove('show');
            overlay.classList.remove('show');

            document.body.classList.remove('no-scroll');
        });

        document.querySelectorAll('.menu-parent .small-logo')
            .forEach(icon => {

                icon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const parent = this.closest('.menu-parent');

                    // đóng menu khác (accordion)
                    document.querySelectorAll('.menu-parent')
                        .forEach(el => {
                            if (el !== parent) el.classList.remove('open');
                        });

                    parent.classList.toggle('open');
                });

            });

        new Swiper('.leader-slider', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    </script>
@endpush
