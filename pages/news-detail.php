<?php
// File: /testing_web/pages/news-detail.php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$slug = trim($_GET['slug'] ?? '');
if (!$slug) { http_response_code(404); die('Không tìm thấy bài viết.'); }

$news = get_news_by_slug($pdo, $slug);
if (!$news) { http_response_code(404); $page_title = 'Không tìm thấy'; }
else { $page_title = $news['title']; }

require_once __DIR__ . '/../includes/header.php';
?>
<main>
    <section class="news-detail" style="padding:80px 0;background:#fff;">
        <div class="container" style="max-width:900px;">
            <?php if (!$news): ?>
                <div style="text-align:center;padding:80px 20px;">
                    <h1 style="font-size:4rem;color:#EB0452;">404</h1>
                    <p style="font-size:1.3rem;color:#666;">Bài viết không tồn tại hoặc đã bị xóa.</p>
                    <a href="<?= BASE_URL ?>/news" style="color:#0D2488;font-weight:bold;">← Quay lại Tin tức</a>
                </div>
            <?php else: ?>
                <article>
                    <h1 style="font-size:2.5rem;color:#0D2488;margin-bottom:20px;text-align:center;">
                        <?= htmlspecialchars($news['title']) ?>
                    </h1>
                    <div style="text-align:center;color:#999;font-size:0.95rem;margin-bottom:30px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block;vertical-align:middle;margin-right:5px;">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                        </svg>
                        <?= date('d/m/Y', strtotime($news['created_at'])) ?>
                    </div>

                    <?php if ($news['image']): ?>
                        <img src="<?= BASE_URL ?>/<?= $news['image'] ?>" alt="<?= htmlspecialchars($news['title']) ?>" style="width:100%;max-height:500px;object-fit:cover;border-radius:16px;margin:30px 0;">
                    <?php endif; ?>

                    <div style="font-size:1.15rem;line-height:1.8;color:#333;">
                        <?= nl2br(htmlspecialchars($news['content'])) ?>
                    </div>

                    <div style="text-align:center;margin-top:50px;padding-top:30px;border-top:1px solid #eee;">
                        <a href="<?= BASE_URL ?>/news" style="background:#0D2488;color:white;padding:12px 30px;border-radius:50px;text-decoration:none;font-weight:bold;">
                            ← Quay lại danh sách tin tức
                        </a>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>