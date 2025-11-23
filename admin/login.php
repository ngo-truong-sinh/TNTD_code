<?php
// File: /testing_web/admin/login.php – ĐÃ SỬA LỖI 100%
session_start();

// Nếu đã đăng nhập rồi → vào thẳng dashboard
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header('Location: dashboard.php');
    exit;
}

$password_correct = ''; // ← Thay đổi ở đây nếu muốn

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_password = $_POST['password'] ?? '';

    if ($input_password === $password_correct) {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Sai mật khẩu!';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body{background:#f1f5f9;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
        .login-box{background:white;padding:40px;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,.1);width:340px;text-align:center;}
        input[type=password]{width:100%;padding:14px;margin:15px 0;border:1px solid #ddd;border-radius:8px;font-size:16px;box-sizing:border-box;}
        button{background:#EB0452;color:white;padding:14px 30px;border:none;border-radius:8px;cursor:pointer;font-weight:bold;font-size:16px;}
        .error{color:#d63638;background:#ffeaea;padding:12px;border-radius:8px;margin-top:15px;}
    </style>
</head>
<body>
<div class="login-box">
    <h2>ADMIN CMS</h2>
    <form method="post">
        <input type="password" name="password" placeholder="Nhập mật khẩu" required autofocus>
        <button type="submit">Đăng nhập</button>
    </form>
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</div>
</body>
</html>