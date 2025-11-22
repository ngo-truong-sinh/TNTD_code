<?php
// File: /testing_web/admin/dashboard.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
// load helpers (this will also load config and $pdo)
require_once __DIR__ . '/../includes/functions.php';
$total = count_news($pdo);
$published = count_news($pdo, 'published');
$drafts = count_news($pdo, 'draft');
?>
<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><title>CMS Dashboard</title>
<link rel="stylesheet" href="../assets/css/styles.css">
<style>body{background:#f8fafc;font-family:sans-serif;}.container{max-width:1000px;margin:0 auto;padding:20px;}
nav{background:#0D2488;color:white;padding:15px;border-radius:8px;margin-bottom:20px;}
nav a{color:white;text-decoration:none;margin-right:20px;font-weight:bold;}
.card{background:white;padding:20px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.05);margin:15px 0;}
</style></head><body>
<div class="container">
    <nav><a href="dashboard.php">Dashboard</a> <a href="news-list.php">Danh sách bài</a> <a href="news-add.php">Thêm bài</a> <a href="logout.php">Đăng xuất</a></nav>
    <h1>Thống kê</h1>
    <div style="display:flex;gap:20px;">
        <div class="card"><h3>Tổng số bài viết</h3><h2><?= $total ?></h2></div>
        <div class="card"><h3>Đã đăng</h3><h2><?= $published ?></h2></div>
        <div class="card"><h3>Nháp</h3><h2><?= $drafts ?></h2></div>
    </div>
    <div class="card"><p>Trình quản lý bài đăng thieunhithoidai</p></div>
</div>
</body></html>