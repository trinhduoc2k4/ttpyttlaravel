<div id="left-menu">
    <ul>
        <li @class(['active' => request()->routeIs('dashboard')])>
            <img class="icon" src="{{ asset('icons/dashboard.jpg') }}" alt="">
            <a href="{{ route('dashboard') }}">
                <span>Dashboard</span>
            </a>
        </li>
        <hr>
        <li class="list-post">
            <img class="icon" src="{{ asset('icons/news.png') }}" alt="">
            <span>Bài viết</span>
            <ul>
                <li @class([
                    'active' => request()->is('admin/post/*/tin-tuc-su-kien/1*'),
                ])><a
                        href="{{ route('index', ['slug' => config('global.tin-tuc'), 'idCategory' => 1]) }}"><span>Tin
                            tức - sự kiện</span></a>
                </li>
                <li @class([
                    'active' => request()->is('admin/post/*/hoat-dong-chuyen-mon/2*'),
                ])><a
                        href="{{ route('index', ['slug' => config('global.chuyen-mon'), 'idCategory' => 2]) }}"><span>Hoạt
                            động chuyên
                            môn</span></a></li>
                <li @class(['active' => request()->is('admin/post/*/thong-tin-y-te/3*')])><a
                        href="{{ route('index', ['slug' => config('global.y-te'), 'idCategory' => 3]) }}"><span>Thông
                            tin y tế</span></a></li>
                <li @class([
                    'active' => request()->is('admin/post/*/hoat-dong-cong-doan/4*'),
                ])><a
                        href="{{ route('index', ['slug' => config('global.cong-doan'), 'idCategory' => 4]) }}"><span>Hoạt
                            động công
                            đoàn</span></a></li>
                <li @class([
                    'active' => request()->is('admin/post/*/hoat-dong-doan-thanh-nien/5*'),
                ])><a
                        href="{{ route('index', ['slug' => config('global.doan-thanh-nien'), 'idCategory' => 5]) }}"><span>
                            Hoạt động đoàn thanh
                            niên</span></a>
                </li>
                <li @class([
                    'active' => request()->is('admin/post/*/thong-bao/6*'),
                ])><a
                        href="{{ route('index', ['slug' => config('global.thong-bao'), 'idCategory' => 6]) }}"><span>
                            Thông báo</span></a>
                </li>
            </ul>
        </li>
        <hr>
        <li @class(['active' => request()->is('admin/thumbnail*')])>
            <img class="icon" src="{{ asset('icons/images.png') }}" alt="">
            <a href="{{ route('thumbnail.index') }}">
                <span>Ảnh</span>
            </a>
        </li>
        <hr>
        <li class="list-post">
            <img class="icon" src="{{ asset('icons/law.jpg') }}" alt="">
            <span>Thư viện</span>
            <ul>
                <li @class([
                    'active' => request()->is('admin/lib/*/album*'),
                ])><a href="{{ route('album.get.index') }}"><span>Ảnh</span></a>
                </li>
                <li @class([
                    'active' => request()->is('admin/lib/*/van-ban-phap-luat*'),
                ])><a
                        href="{{ route('lib.index', config('global.phap-luat')) }}"><span>Văn
                            bản pháp
                            luật</span></a></li>
            </ul>
            </a>
        </li>
        <hr>
        <li @class(['active' => request()->is('admin/user*')])>
            <img class="icon" src="{{ asset('icons/user.png') }}" alt="">
            <a href="{{ route('user.index') }}">
                <span>Người dùng</span>
            </a>
        </li>
    </ul>
</div>
