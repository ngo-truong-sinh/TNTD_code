<?php
// File: /testing_web/pages/about.php
// Mô tả: Trang "Về chúng tôi" – dữ liệu testimonials, team, members lấy từ DB

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

$page_title = 'Về Chúng Tôi';

// Lấy dữ liệu từ DB
$testimonials   = get_testimonials($pdo);
$team_members   = get_team_members($pdo);
$project_members = get_project_members($pdo);
?>
<main>
    <!-- HERO SECTION -->
    <section class="hero-section about-hero-section">
        <div class="hero-content">
            <div class="quote-container">
                <h2 class="quote-text">
                    “Cùng <span class="highlight-text">Thiếu Nhi Thời Đại</span> viết tiếp câu chuyện tương lai cho trẻ em Việt Nam”
                </h2>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testimonials">
        <div class="container">
            <div class="testimonials-grid">
                <div class="title-wrapper">
                    <h2 class="roadmap-title">Chia sẻ của các Thành viên</h2>
                </div>

                <?php foreach ($testimonials as $t): ?>
                    <?php render_testimonial($t['content']); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section class="team-section">
        <h2 class="roadmap-title">Gặp gỡ đội ngũ quản lí dự án</h2>

        <div class="team-grid">
            <?php foreach ($team_members as $member): ?>
                <?php render_team_card($member); ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- MEMBER SECTION -->
    <section class="member-section">
        <div class="container">
            <h2 class="main-title">Gặp gỡ thành viên dự án</h2>

            <div class="member-grid">
                <?php foreach ($project_members as $m): ?>
                    <?php render_member_card($m['full_name']); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta">
        <div class="container">
            <h2 class="roadmap-title">ĐỒNG HÀNH CÙNG CHÚNG TÔI</h2>
            <div class="cta-box">
                <h3 class="cta-subtitle">Hãy tham gia cùng chúng tôi</h3>
                <p>Đăng ký ngay và trở thành một phần của chúng tôi để cùng mang đến những thay đổi tích cực cho trẻ em Việt Nam.</p>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSf7XAWIGukJpzUsPTG1DiFWzkKiKw4fn4VhztpEUWWpuTsgeQ/viewform">
                    <button class="cta-button">Đăng Ký Ngay</button>
                </a>
                <img class="cta-bears" src="<?= asset('/images/three-bears.png') ?>" alt="Hình ảnh ba con gấu">
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>