<?php
// File: /testing_web/pages/news.php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'Tin tức';

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 6;
$offset = ($page - 1) * $limit;

$news_list = get_news_list($pdo, $limit, $offset, 'published');
$total = count_news($pdo, 'published');
$pages = ceil($total / $limit);

require_once __DIR__ . '/../includes/header.php';
?>
<main>
    <section class="news-section" style="padding:80px 0;background:#f8fafc;">
        <div class="container">
            <h2 class="roadmap-title" style="text-align:center;margin-bottom:50px;">TIN TỨC & HOẠT ĐỘNG</h2>

            <?php if (empty($news_list)): ?>
                <p style="text-align:center;font-size:1.2rem;color:#666;">Chưa có tin tức nào được đăng.</p>
            <?php else: ?>
                <div class="news-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(350px,1fr));gap:30px;">
                    <?php foreach ($news_list as $item): ?>
                        <article class="news-card" style="background:white;border-radius:16px;overflow:hidden;box-shadow:0 8px 25px rgba(0,0,0,.08);transition:0.3s;">
                            <a href="<?= BASE_URL ?>/news/<?= $item['slug'] ?>" style="text-decoration:none;color:inherit;">
                                <?php if ($item['image']): ?>
                                    <img src="<?= BASE_URL ?>/<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" style="width:100%;height:220px;object-fit:cover;">
                                <?php else: ?>
                                    <div style="width:100%;height:220px;background:#e0e0e0;display:flex;align-items:center;justify-content:center;color:#999;font-size:1.2rem;">
                                        Không có ảnh
                                    </div>
                                <?php endif; ?>
                                <div style="padding:20px;">
                                    <h3 style="margin:0 0 12px;font-size:1.35rem;color:#0D2488;">
                                        <?= htmlspecialchars($item['title']) ?>
                                    </h3>
                                    <p style="color:#555;line-height:1.6;margin:0 0 15px;">
                                        <?= $item['excerpt'] ? htmlspecialchars($item['excerpt']) : 'Xem chi tiết...' ?>
                                    </p>
                                    <div style="color:#999;font-size:0.9rem;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block;vertical-align:middle;margin-right:5px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                        </svg>
                                        <?= date('d/m/Y', strtotime($item['created_at'])) ?>
                                    </div>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- PHÂN TRANG -->
                <?php if ($pages > 1): ?>
                    <div class="pagination" style="text-align:center;margin-top:50px;">
                        <?php for ($i = 1; $i <= $pages; $i++): ?>
                            <a href="?page=<?= $i ?>" style="display:inline-block;padding:10px 16px;margin:0 5px;background:<?= $i==$page?'#EB0452':'#0D2488' ?>;color:white;border-radius:8px;text-decoration:none;">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>