<?php
// File: /testing_web/includes/functions.php
// Mô tả: Các hàm tiện ích – query, render testimonials/team/members

require_once __DIR__ . '/config.php';

/**
 * Lấy tất cả testimonials (active)
 */
function get_testimonials($pdo, $limit = null) {
    $sql = "SELECT content FROM testimonials WHERE is_active = 1 ORDER BY id";
    if ($limit) $sql .= " LIMIT :limit";
    $stmt = $pdo->prepare($sql);
    if ($limit) $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Lấy team members (quản lý)
 */
function get_team_members($pdo) {
    $sql = "SELECT full_name, role, school, image_path 
            FROM team_members 
            WHERE is_active = 1 
            ORDER BY display_order, id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Lấy project members (thành viên dự án)
 */
function get_project_members($pdo) {
    $sql = "SELECT full_name 
            FROM project_members 
            WHERE is_active = 1 
            ORDER BY display_order, id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Render testimonial card
 */
function render_testimonial($content) {
    echo '<article class="testimonial-card"><blockquote><p>' . htmlspecialchars($content) . '</p></blockquote></article>';
}

/**
 * Render team card
 */
function render_team_card($member) {
    $img = asset($member['image_path']);
    $name = htmlspecialchars($member['full_name']);
    $role = htmlspecialchars($member['role']);
    $school = htmlspecialchars($member['school']);
    
    echo <<<HTML
    <article class="team-card">
        <div class="team-avatar" style="background-image: url('$img');"></div>
        <div class="team-content">
            <h4 class="team-name">$name</h4>
            <p class="team-title">$role</p>
            <p class="team-support-text">$school</p>
        </div>
    </article>
    HTML;
}

/**
 * Render member card (không ảnh)
 */
function render_member_card($name) {
    $name = htmlspecialchars($name);
    echo <<<HTML
    <article class="member-card">
        <div class="member-content">
            <h4 class="member-name">$name</h4>
            <p class="member-desc">Thành viên dự án</p>
        </div>
    </article>
    HTML;
}

// Lấy danh sách tin tức (phân trang)
function get_news_list($pdo, $limit = 6, $offset = 0, $status = 'published') {
    $sql = "SELECT id, title, slug, excerpt, image, created_at 
            FROM news 
            WHERE status = ? 
            ORDER BY created_at DESC 
            LIMIT ? OFFSET ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$status, $limit, $offset]);
    return $stmt->fetchAll();
}

function get_all_news_admin($pdo, $limit = 10, $offset = 0) {
    $sql = "SELECT id, title, slug, excerpt, image, created_at, status 
            FROM news 
            ORDER BY created_at DESC 
            LIMIT ? OFFSET ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$limit, $offset]);
    return $stmt->fetchAll();
}

// Đếm tổng bài (tất cả hoặc theo trạng thái)
function count_news($pdo, $status = null) {
    if ($status === null || $status === '') {
        $stmt = $pdo->query("SELECT COUNT(*) FROM news");
        return $stmt->fetchColumn();
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM news WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchColumn();
    }
}

// Lấy bài theo slug
function get_news_by_slug($pdo, $slug) {
    $stmt = $pdo->prepare("SELECT * FROM news WHERE slug = ? AND status = 'published'");
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

// Tạo slug

function create_slug($string) {
    // Bước 1: Chuyển về chữ thường
    $slug = mb_strtolower($string, 'UTF-8');

    // Bước 2: Loại bỏ dấu tiếng Việt
    $accents = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ'
    ];
    foreach ($accents as $nonAccent => $pattern) {
        $slug = preg_replace("/($pattern)/u", $nonAccent, $slug);
    }

    // Bước 3: Loại bỏ ký tự đặc biệt
    $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);

    // Bước 4: Thay khoảng trắng bằng dấu gạch ngang
    $slug = preg_replace('/\s+/', '-', trim($slug));

    // Bước 5: Loại bỏ dấu - thừa ở đầu/cuối
    $slug = trim($slug, '-');

    return $slug;
}
