<?php
// File: /testing_web/pages/404.php
// Mô tả: Trang 404 – hiển thị khi URL sai

http_response_code(404);
$page_title = 'Không Tìm Thấy';
require_once __DIR__ . '/../includes/header.php';
?>
<main style="text-align: center; padding: 100px 20px; background: #f9f9f9;">
    <h1 style="font-size: 6rem; color: #EB0452; margin: 0;">404</h1>
    <p style="font-size: 1.5rem; color: #0D2488; margin: 20px 0;">Trang bạn tìm không tồn tại.</p>
    <a href="<?= BASE_URL ?>" class="button button--primary">Quay về Trang chủ</a>
</main>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>