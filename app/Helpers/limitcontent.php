<?php
if (!function_exists('str_limit')) {
    function str_limit($value, $limit = 100, $end = '...') {
        return \Illuminate\Support\Str::limit($value, $limit, $end);
    }
}
