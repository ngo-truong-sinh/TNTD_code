<?php
// File: /testing_web/includes/header.php
// Mô tả: Header chung cho mọi trang (PHP include)

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>Dự Án Thiếu Nhi Thời Đại</title>
    <link rel="icon" href="<?= asset('/images/logonho.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Be+Vietnam+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('/css/styles.css') ?>?v=<?= filemtime(__DIR__ . '/../assets/css/styles.css') ?>">
    <script src="<?= asset('/js/script.js') ?>?v=<?= filemtime(__DIR__ . '/../assets/js/script.js') ?>" defer></script></script>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <a href="<?= BASE_URL ?>" class="header__logo">
                <img src="<?= asset('/images/logo.png') ?>" alt="Thiếu Nhi Thời Đại">
            </a>

            <button class="header__toggle" aria-label="Open navigation menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="header__menu">
                <nav class="header__nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="<?= BASE_URL ?>" class="nav__link">Trang chủ</a></li>                        
                        <li class="nav__item"><a href="<?= BASE_URL ?>/pages/about.php" class="nav__link">Về chúng tôi</a></li>
                        <li class="nav__item"><a href="<?= BASE_URL ?>/news" class="nav__link">Tin tức</a></li>
                        <li class="nav__item"><a href="<?= BASE_URL ?>/contact" class="nav__link">Liên hệ</a></li>
                    </ul>
                </nav>

                <div class="header__actions">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf7XAWIGukJpzUsPTG1DiFWzkKiKw4fn4VhztpEUWWpuTsgeQ/viewform" 
                       class="button button--outline" style="background-color: rgba(255, 255, 255, 0.9);">Tham gia</a>
                    <a href="#" class="button button--primary" style="display: none;">Ủng hộ</a>
                    <div class="header__language" style="display: none;">
                        <a href="#" class="language__link">VN</a>
                        <span>|</span>
                        <a href="#" class="language__link is-active">EN</a>
                    </div>
                </div>
            </div>
        </div>
    </header>