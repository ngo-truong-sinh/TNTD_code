<?php include 'nav.php'; ?>
<?php
// File: /testing_web/admin/process.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$upload_dir = __DIR__ . '/../uploads/news/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'add' || $action === 'update') {
    $title = trim($_POST['title']);
    $slug = create_slug($title);
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    
    // Upload ảnh
    $image_path = $action === 'update' ? $pdo->query("SELECT image FROM news WHERE id=".(int)$_POST['id'])->fetchColumn() : null;
    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = $slug . '.' . strtolower($ext);
        $target = $upload_dir . $filename;
        if (in_array($ext, ['jpg','jpeg','png','webp']) && $_FILES['image']['size'] < 2*1024*1024) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $image_path = 'uploads/news/' . $filename;
        }
    }

    if ($action === 'add') {
        $stmt = $pdo->prepare("INSERT INTO news (title, slug, excerpt, content, image, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $slug, $excerpt, $content, $image_path, $status]);
    } else {
        $stmt = $pdo->prepare("UPDATE news SET title=?, slug=?, excerpt=?, content=?, image=?, status=? WHERE id=?");
        $stmt->execute([$title, $slug, $excerpt, $content, $image_path, $status, $_POST['id']]);
    }
    header('Location: news-list.php');
}

elseif ($action === 'delete') {
    $id = (int)$_GET['id'];
    $image = $pdo->query("SELECT image FROM news WHERE id=$id")->fetchColumn();
    if ($image && file_exists(__DIR__.'/../'.$image)) unlink(__DIR__.'/../'.$image);
    $pdo->query("DELETE FROM news WHERE id=$id");
    header('Location: news-list.php');
}