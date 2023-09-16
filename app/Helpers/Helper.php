<?php

// app/Helpers/Helper.php

if (!function_exists('formatHarga')) {
    function formatHarga($nominal) {
        if ($nominal >= 1000000000) {
            return round($nominal / 1000000000, 1) . ' Miliar';
        } elseif ($nominal >= 1000000) {
            return round($nominal / 1000000, 1) . ' Juta';
        } else {
            return $nominal;
        }
    }
}
