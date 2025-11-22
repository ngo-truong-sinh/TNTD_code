<?php
// File: /testing_web/admin/news-list.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 10;
$offset = ($page - 1) * $limit;

$total = count_news($pdo);
$pages = ceil($total / $limit);

$news = get_all_news_admin($pdo, $limit, $offset);
?>
<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><title>Danh sách bài viết</title>
<link rel="stylesheet" href="../assets/css/styles.css">
<style>table{width:100%;border-collapse:collapse;margin:20px 0;}th,td{border:1px solid #ddd;padding:12px;text-align:left;}th{background:#0D2488;color:white;}
tr:nth-child(even){background:#f9f9f9;}.btn{padding:6px 12px;margin:0 4px;border:none;border-radius:4px;cursor:pointer;}
.btn-edit{background:#007cba;color:white;}.btn-delete{background:#d63638;color:white;}
.pagination{margin:20px 0;text-align:center;}.pagination a{margin:0 5px;padding:8px 12px;background:#0D2488;color:white;text-decoration:none;border-radius:4px;}
</style></head><body>
<div class="container" style="max-width:1100px;margin:0 auto;padding:20px;">
    <?php include 'nav.php'; ?>
    <h1>Danh sách bài viết (<?= $total ?>)</h1>
    <p><a href="news-add.php" class="btn" style="background:#28a745;color:white;">+ Thêm bài mới</a></p>
    <table>
        <tr><th>ID</th><th>Tiêu đề</th><th>Trạng thái</th><th>Ngày tạo</th><th>Hành động</th></tr>
        <?php foreach ($news as $n): ?>
        <tr>
            <td><?= $n['id'] ?></td>
            <td><?= htmlspecialchars($n['title']) ?></td>
            <td><span style="color:<?= $n['status']=='published'?'green':'orange' ?>;font-weight:bold;">
                <?= $n['status']=='published'?'Đã đăng':'Nháp' ?>
            </span></td>
            <td><?= date('d/m/Y', strtotime($n['created_at'])) ?></td>
            <td>
                <a href="news-edit.php?id=<?= $n['id'] ?>" class="btn btn-edit">Sửa</a>
                <a href="process.php?action=delete&id=<?= $n['id'] ?>" class="btn btn-delete" onclick="return confirm('Xóa thật không?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="pagination">
        <?php for($i=1;$i<=$pages;$i++): ?>
            <a href="?page=<?= $i ?>" <?= $i==$page?'style="background:#EB0452;"':'' ?>><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
</body></html>