<?php
// File: /testing_web/index.php – ROUTER HOÀN CHỈNH
require_once __DIR__ . '/includes/config.php';

$request = $_SERVER['REQUEST_URI'];
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); // tự động lấy BASE_URL đúng
$path = trim(str_replace($base, '', $request), '/');
$path = parse_url($path, PHP_URL_PATH); // bỏ query string

$page = 'home'; // mặc định

if ($path === '' || $path === 'index.php') {
    $page = 'home';
}
elseif ($path === 'about') {
    $page = 'about';
}
elseif ($path === 'contact') {
    $page = 'contact';
}
elseif ($path === 'news') {
    $page = 'news';
}
elseif (preg_match('#^news/(.+)$#', $path, $matches)) {
    $_GET['slug'] = $matches[1];
    $page = 'news-detail';
}
elseif ($path === 'contact') {
    $page = 'contact';
}
else {
    http_response_code(404);
    $page = '404';
}

$page_file = __DIR__ . "/pages/{$page}.php";

if (file_exists($page_file)) {
    $page_title = match($page) {
        'home' => 'Trang Chủ',
        'about' => 'Về Chúng Tôi',
        'news' => 'Tin tức & Sự kiện',
        'news-detail' => 'Chi tiết bài viết',
        'contact' => 'Liên hệ',
        default => 'Không tìm thấy'
    };
    require $page_file;
} else {
    http_response_code(404);
    echo '<h1 style="text-align:center;padding:100px;font-family:sans-serif;">404 - Trang không tồn tại</h1>';
}