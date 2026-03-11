<?php

use Carbon\Carbon;

if (!function_exists('now_vn')) {
    function now_vn()
    {
        return ucfirst(now()
            ->locale('vi')
            ->translatedFormat('l, d/m/Y H:i'));
    }
}
