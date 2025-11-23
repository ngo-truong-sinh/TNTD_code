<?php
// File: /testing_web/includes/config.php
// Mô tả: Kết nối DB + hằng số toàn cục

// === CẤU HÌNH DATABASE ===
define('DB_HOST', 'localhost');
define('DB_NAME', 'testing_web_local');
define('DB_USER', 'root');
define('DB_PASS', ''); // ← CẬP NHẬT MẬT KHẨU NẾU CÓ
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8mb4'); // ← CẬP NHẬT MẬT KHẨU NẾU CÓ

// === KẾT NỐI PDO ===
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // Ẩn lỗi chi tiết khi production
    error_log('Database connection failed: ' . $e->getMessage());
    die('Database connection failed: ' . $e->getMessage());
}

// === HẰNG SỐ ĐƯỜNG DẪN ===
// Tự động phát hiện BASE_URL (hoạt động trên mọi môi trường)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$scriptDir = str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('BASE_URL', $scriptDir === '/' ? '' : $scriptDir);
define('ASSETS_URL', BASE_URL . '/assets');
define('INCLUDES_PATH', __DIR__);

// === HÀM HỖ TRỢ (sẽ mở rộng trong functions.php) ===
function asset($path) {
    return ASSETS_URL . $path;
}