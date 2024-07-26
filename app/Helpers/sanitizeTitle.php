<?php
// app/Helpers/helpers.php
if (!function_exists('sanitizeTitle')) {
    function sanitizeTitle($title) {
        // Loại bỏ các ký tự không hợp lệ cho tên thư mục
        return preg_replace('/[\/\\\*<>;?]+/', '', $title);
    }
}

