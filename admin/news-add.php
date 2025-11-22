<?php
// File: /testing_web/admin/news-add.php  (và news-edit.php dùng chung)
// Nếu truy cập news-edit.php → load dữ liệu cũ
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$is_edit = basename($_SERVER['PHP_SELF']) === 'news-edit.php';
$id = $_GET['id'] ?? null;
$news = $is_edit && $id ? $pdo->query("SELECT * FROM news WHERE id = ".(int)$id)->fetch() : null;
if ($is_edit && !$news) { die('Bài không tồn tại'); }
?>
<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><title><?= $is_edit?'Sửa':'Thêm' ?> bài viết</title>
<link rel="stylesheet" href="../assets/css/styles.css">
<style>form{background:white;padding:30px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,.1);max-width:800px;margin:20px auto;}
input,textarea,select{width:100%;padding:12px;margin:10px 0;border:1px solid #ddd;border-radius:8px;font-size:16px;}
textarea{height:300px;}button{background:#EB0452;color:white;padding:14px 30px;border:none;border-radius:8px;cursor:pointer;font-size:16px;}
</style></head><body>
<div class="container">
    <?php include 'nav.php'; ?>
    <h1><?= $is_edit?'Sửa':'Thêm' ?> bài viết</h1>
    <form method="post" action="process.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?= $is_edit?'update':'add' ?>">
        <?php if($is_edit): ?><input type="hidden" name="id" value="<?= $news['id'] ?>"><?php endif; ?>
        
        <label>Tiêu đề</label>
        <input type="text" name="title" value="<?= $news['title']??'' ?>" required>
        
        <label>Tóm tắt (excerpt)</label>
        <textarea name="excerpt"><?= $news['excerpt']??'' ?></textarea>
        
        <label>Nội dung</label>
        <textarea name="content" required><?= $news['content']??'' ?></textarea>
        
        <label>Ảnh đại diện (JPG/PNG, < 2MB)</label>
        <input type="file" name="image" accept="image/*">
        <?php if($is_edit && $news['image']): ?>
            <p>Ảnh hiện tại: <img src="../<?= $news['image'] ?>" style="max-height:150px;margin:10px 0;"></p>
        <?php endif; ?>
        
        <label>Trạng thái</label>
        <select name="status">
            <option value="published" <?= ($news['status']??'')=='published'?'selected':'' ?>>Đã đăng</option>
            <option value="draft" <?= ($news['status']??'draft')=='draft'?'selected':'' ?>>Nháp</option>
        </select>
        
        <button type="submit"><?= $is_edit?'Cập nhật':'Đăng bài' ?></button>
    </form>
</div>
</body></html>