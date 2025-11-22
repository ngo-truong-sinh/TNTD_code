<?php
// File: /testing_web/pages/home.php
// Mô tả: Trang chủ – giữ nguyên HTML gốc, chỉ thêm PHP include + asset()

if (!isset($page_title)) $page_title = 'Trang Chủ';
require_once __DIR__ . '/../includes/header.php';
?>
<main>
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>"Thiếu Nhi Thời Đại" - Giáo Dục Cảm Xúc Sáng Tạo</h1>
            <p>
                Là dự án giáo dục thiết thực và sáng tạo, dễ triển khai. 
                Dự án nhằm trang bị kỹ năng cảm xúc, nhận biết bản thân, 
                phòng vệ tinh thần cho trẻ em Việt Nam.
            </p>
        </div>
        <div class="hero-image-container">
            <img src="<?= asset('/images/herobannerimage.png') ?>" alt="Thiếu Nhi Thời Đại Banner Image">        
        </div>
    </section>

    <!-- MỤC TIÊU SECTION -->
    <section id="muc-tieu-section">
        <h2 class="muc-tieu-title">MỤC TIÊU</h2>
        <div class="muc-tieu-description-box">
            <p class="description-text">
                Dự án "Thiếu Nhi Thời Đại" ra đời để mang đến những kỹ năng giáo dục chính quy còn thiếu. Chúng tôi tin rằng mỗi đứa trẻ đều xứng đáng được trang bị nội lực vững vàng để đối mặt với mọi thử thách.
            </p>
            <img src="<?= asset('/images/gau_nhay.png') ?>" style="transform: scaleX(1);" alt="Gấu minh họa" class="description-bear">
        </div>

        <div class="slider-dots">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
        </div>

        <div class="muc-tieu-services">
            <article class="service-card">
                <div class="service-icon"><img src="<?= asset('/images/icons/icon-training.png') ?>" alt="Checklist Icon"></div>
                <div class="service-text-content">
                    <h3 class="service-card-title">Tiếp cận Trực tiếp</h3>
                    <p class="service-card-description">Mang bộ công cụ giáo dục cảm xúc đến 20.000 trẻ em (6-12 tuổi) tại 15 tỉnh thành khó khăn.</p>
                </div>
            </article>
            <article class="service-card">
                <div class="service-icon"><img src="<?= asset('/images/icons/icon-innovation.png') ?>" alt="Money Bag Icon"></div>
                <div class="service-text-content">
                    <h3 class="service-card-title">Bộ công cụ Sáng tạo</h3>
                    <p class="service-card-description">Phát triển tạp chí tương tác và workshop thực hành, tập trung vào kỹ năng cảm xúc, tâm lý và phòng vệ bản thân.</p>
                </div>
            </article>
            <article class="service-card">
                <div class="service-icon"><img src="<?= asset('/images/icons/icon-training.png') ?>" alt="Announcement Icon"></div>
                <div class="service-text-content">
                    <h3 class="service-card-title">Đào tạo Nguồn lực</h3>
                    <p class="service-card-description">Xây dựng năng lực cho hơn 200 giáo viên, cán bộ và tình nguyện viên để họ trở thành "người bảo vệ tinh thần" tại cộng đồng.</p>
                </div>
            </article>
            <article class="service-card">
                <div class="service-icon"><img src="<?= asset('/images/icons/icon-community.png') ?>" alt="Presentation Icon"></div>
                <div class="service-text-content">
                    <h3 class="service-card-title">Môi trường Đồng bộ</h3>
                    <p class="service-card-description">Tạo ra mạng lưới hỗ trợ bền vững từ gia đình – nhà trường – cộng đồng, hướng đến 10 tỉnh có khả năng tự vận hành.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- FEATURE SECTION (giữ nguyên HTML) -->
    <section id="feature-section">
        <div class="feature-container">
            <h2>ĐIỀU GÌ TẠO NÊN SỰ KHÁC BIỆT?</h2>
            <div class="features-content">
                <div class="mascot-container">
                    <img src="<?= asset('/images/bear-reading.png') ?>" alt="Mascot" class="features-mascot">
                </div>
                <div class="features-grid">
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/icon-child.png') ?>" alt="Icon Trẻ em" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">Trẻ em là trung tâm</h3>
                            <p class="card-description">Mọi nội dung đều được thiết kế phù hợp với khả năng tiếp nhận và nhu cầu thực tế của trẻ.</p>
                        </div>
                    </article>
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/icon-emotion.png') ?>" alt="Icon Bảo vệ trẻ em" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">An toàn và lành mạnh</h3>
                            <p class="card-description">Cam kết bảo vệ tuyệt đối tâm lý - cảm xúc - thể chất của trẻ khi tiếp cận nội dung.</p>
                        </div>
                    </article>
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/015-speak.png') ?>" alt="Icon Tăng quyền nói" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">Tăng quyền nói</h3>
                            <p class="card-description">Giúp trẻ dám thể hiện cảm xúc, nói "không", nêu ý kiến, và tìm kiếm sự giúp đỡ khi cần.</p>
                        </div>
                    </article>
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/011-press-day.png') ?>" alt="Icon Cân bằng" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">Bình đẳng cơ hội</h3>
                            <p class="card-description">Tạo điều kiện cho trẻ em ở vùng sâu vùng xa, nhóm yếu thế có cơ hội tiếp cận giáo dục cảm xúc.</p>
                        </div>
                    </article>
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/icon-innovation.png') ?>" alt="Icon Ý tưởng" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">Sáng tạo dễ áp dụng</h3>
                            <p class="card-description">Nội dung được truyền tải qua hình ảnh, kể chuyện, trò chơi và các hoạt động tương tác.</p>
                        </div>
                    </article>
                    <article class="feature-card">
                        <img src="<?= asset('/images/icons/icon-community.png') ?>" alt="Icon Cộng đồng" class="card-icon">
                        <div class="card-content">
                            <h3 class="card-title">Lan tỏa cộng đồng</h3>
                            <p class="card-description">Kết nối phụ huynh - giáo viên - đoàn thể để cùng hỗ trợ sự phát triển tinh thần của trẻ.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW WE WORK -->
    <section class="how-we-work-wrapper">
        <h2 class="main-title">CÁCH CHÚNG TÔI LÀM VIỆC</h2>
        <section class="how-we-work-timeline">
            <div class="how-we-work-item">
                <div class="item-title"><span>#1</span><span>Phát triển nội dung & Thử nghiệm</span></div>
                <p class="item-description">Khảo sát nhu cầu thực địa, thiết kế bộ công cụ và thử nghiệm tại 3 địa phương đại diện để tinh chỉnh và hoàn thiện.</p>
            </div>
            <div class="how-we-work-item">
                <div class="item-title"><span>#2</span><span>Đào tạo đội ngũ địa phương</span></div>
                <p class="item-description">Tổ chức tập huấn, cung cấp công cụ sư phạm cho giáo viên và cán bộ đoàn thể để họ chủ động triển khai tại cộng đồng.</p>
            </div>
            <div class="how-we-work-item">
                <div class="item-title"><span>#3</span><span>Tổ chức hoạt động tại chỗ</span></div>
                <p class="item-description">Triển khai workshop trực tiếp cho trẻ em, phân phối tạp chí tương tác, kết hợp linh hoạt các hoạt động trong và ngoài giờ học.</p>
            </div>
            <div class="how-we-work-item">
                <div class="item-title"><span>#4</span><span>Truyền thông & Kết nối</span></div>
                <p class="item-description">Khảo sát nhu cầu thực địa, thiết kế bộ công cụ và thử nghiệm tại 3 địa phương đại diện để tinh chỉnh và hoàn thiện.</p>
            </div>
        </section>
    </section>

    <!-- ROADMAP -->
    <section class="roadmap-section">
        <div class="roadmap-container">
            <h2 class="roadmap-title">LỘ TRÌNH DỰ ÁN 2025 - 2026</h2>
            <div class="roadmap-timeline">
                <article class="roadmap-item">
                    <div class="roadmap-item-content">
                        <h3 class="roadmap-item-subheading">Nền tảng & Thử nghiệm (2025)</h3>
                        <div class="roadmap-item-description">
                            <span class="roadmap-decorator-line"></span>
                            <p>Khởi động, nghiên cứu thị trường, xây dựng bộ tài liệu và khung đào tạo. Thử nghiệm và hiệu chỉnh tại 3 tỉnh đầu tiên.</p>
                        </div>
                    </div>
                    <div class="roadmap-item-image">
                        <img src="<?= asset('/images/roadmap/IMG_7084.png') ?>" style="width: 592px; height: 329px;" alt="Hình ảnh 592 x 329">
                    </div>
                </article>
                <article class="roadmap-item">
                    <div class="roadmap-item-content">
                        <h3 class="roadmap-item-subheading">Triển khai & Mở rộng (2026)</h3>
                        <div class="roadmap-item-description">
                            <span class="roadmap-decorator-line"></span>
                            <p>Chính thức triển khai và nhân rộng hoạt động tại 10-15 tỉnh thành mục tiêu. Hoàn thiện quy trình đào tạo và chuyển giao.</p>
                        </div>
                    </div>
                    <div class="roadmap-item-image">
                        <img src="<?= asset('/images/roadmap/roadmap1.png') ?>" alt="Hình ảnh 592 x 329">
                    </div>
                </article>
                <article class="roadmap-item">
                    <div class="roadmap-item-content">
                        <h3 class="roadmap-item-subheading">Tối ưu & Bền vững (2027)</h3>
                        <div class="roadmap-item-description">
                            <span class="roadmap-decorator-line"></span>
                            <p>Đánh giá tác động, tối ưu hóa quy trình vận hành và xây dựng mô hình phát triển bền vững cho các năm tiếp theo.</p>
                        </div>
                    </div>
                    <div class="roadmap-item-image">
                        <img src="<?= asset('/images/roadmap/roadmap2.png') ?>" alt="Hình ảnh 592 x 329">
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="container">
            <h2 class="roadmap-title">ĐỒNG HÀNH CÙNG CHÚNG TÔI</h2>
            <div class="cta-box">
                <h3 class="cta-subtitle">Hãy tham gia cùng chúng tôi</h3>
                <p>Trở thành tình nguyện viên, đối tác hoặc nhà tài trợ để cùng mang đến những thay đổi tích cực cho trẻ em Việt Nam.</p>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSf7XAWIGukJpzUsPTG1DiFWzkKiKw4fn4VhztpEUWWpuTsgeQ/viewform">
                    <button class="cta-button">Tham Gia Ngay</button>
                </a>
                <img class="cta-bears" src="<?= asset('/images/three-bears.png') ?>" alt="Hình ảnh ba con gấu">
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>