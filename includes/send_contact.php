<?php
// File: /testing_web/includes/send_contact.php
require_once __DIR__ . '/config.php';
header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['last_contact_time'])) $_SESSION['last_contact_time'] = 0;
if (time() - $_SESSION['last_contact_time'] < 10) {
    echo json_encode(['success' => false, 'message' => 'Bạn gửi quá nhanh, vui lòng chờ vài giây.']);
    exit;
}

$name = trim(strip_tags($_POST['fb_name'] ?? $_POST['name'] ?? ''));
$email = trim($_POST['fb_email'] ?? $_POST['email'] ?? '');
$phone = trim(strip_tags($_POST['fb_phone'] ?? ''));
$social = trim(strip_tags($_POST['fb_social'] ?? ''));
$message = trim(strip_tags($_POST['fb_message'] ?? $_POST['message'] ?? ''));

// Validate email nếu có
if (($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) || (isset($_POST['email']) && !$email)) {
    echo json_encode(['success' => false, 'message' => 'Email không hợp lệ hoặc chưa nhập email.']);
    exit;
}

// Nếu chỉ có name và email (form đăng ký email), lưu vào subscribers
if (isset($_POST['email']) && !isset($_POST['message']) && !isset($_POST['fb_message'])) {
    try {
        // Kiểm tra trùng email
        $check = $pdo->prepare("SELECT COUNT(*) FROM subscribers WHERE email = ?");
        $check->execute([$email]);
        if ($check->fetchColumn() > 0) {
            echo json_encode(['success' => false, 'message' => 'Email này đã được đăng ký.']);
            exit;
        }
        $stmt = $pdo->prepare("INSERT INTO subscribers (name, email) VALUES (?, ?)");
        $stmt->execute([$name ?: null, $email]);
        $_SESSION['last_contact_time'] = time();
        echo json_encode(['success' => true, 'message' => 'Đăng ký email thành công!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại.']);
    }
    exit;
}

// Nếu có message (form phản hồi), xử lý như cũ
if (empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập nội dung phản hồi.']);
    exit;
}

try {
    // LƯU DB
    $stmt = $pdo->prepare("INSERT INTO feedback (name, email, phone, social, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name ?: 'Ẩn danh', $email ?: null, $phone ?: null, $social ?: null, $message]);

    // GỬI MAIL (ngắn gọn)
    $to = "thieunhithoidai@thieunhithoidai.org";
    $subject = "Phản hồi mới từ website";
    $body = "Tên: " . ($name ?: 'Ẩn danh') . "\n";
    if ($email) $body .= "Email: $email\n";
    if ($phone) $body .= "Phone: $phone\n";
    if ($social) $body .= "Social: $social\n";
    $body .= "\nNội dung:\n$message";
    $headers = "From: no-reply@thieunhithoidai.org";

    mail($to, $subject, $body, $headers);

    $_SESSION['last_contact_time'] = time();
    echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn! Phản hồi đã được gửi thành công.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại.']);
}