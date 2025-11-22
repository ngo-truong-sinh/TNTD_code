<?php
// File: /testing_web/pages/contact.php
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Liên hệ';
require_once __DIR__ . '/../includes/header.php';
?>
<main>
    <section class="contact-section" style="padding:90px 0;background:#f8fafc;">
        <div class="container" style="max-width:1100px;">
            <h2 class="roadmap-title" style="text-align:center;margin-bottom:60px;">LIÊN HỆ VỚI CHÚNG TÔI</h2>

            <div class="contact-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:start;">
                <!-- THÔNG TIN LIÊN HỆ -->
                <div class="contact-box" style="background:white;padding:40px;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.08);">
                    <h3 style="color:#0D2488;font-size:1.8rem;margin-bottom:25px;">Thông tin liên hệ</h3>
                    <p style="margin-bottom:25px;line-height:1.7;color:#555;">
                        Thiếu Nhi Thời Đại luôn sẵn sàng lắng nghe ý kiến từ bạn!<br>
                        Kết nối với chúng tôi qua các kênh sau:
                    </p>
                    <div style="space-y:15px;">
                        <div style="display:flex;align-items:center;gap:15px;">
                            <img src="<?= asset('/images/facebook.png') ?>" alt="Facebook" width="32">
                            <a href="https://www.facebook.com/thieunhithoidai" target="_blank" style="color:#0D2488;font-weight:600;">facebook.com/thieunhithoidai</a>
                        </div>
                        <div style="display:flex;align-items:center;gap:15px;">
                            <img src="<?= asset('/images/instagram.png') ?>" alt="Instagram" width="32">
                            <a href="https://www.instagram.com/thieunhithoidai.official/" target="_blank" style="color:#0D2488;font-weight:600;">@thieunhithoidai.official</a>
                        </div>
                        <div style="display:flex;align-items:center;gap:15px;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="#EB0452"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <a href="mailto:thieunhithoidai@thieunhithoidai.org" style="color:#0D2488;font-weight:600;">thieunhithoidai@thieunhithoidai.org</a>
                        </div>
                    </div>

                    <hr style="margin:40px 0;border:none;border-top:2px solid #eee;">

                    <h3 style="color:#0D2488;font-size:1.6rem;margin-bottom:20px;">Để lại email của bạn</h3>
                    <form id="quick-form" style="space-y:15px;">
                        <input type="text" name="name" placeholder="Họ tên" style="width:100%;padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                        <input type="email" name="email" placeholder="Email" required style="width:100%;padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                        <button type="submit" style="background:#EB0452;color:white;padding:14px 30px;border:none;border-radius:50px;cursor:pointer;font-weight:bold;font-size:1rem;">Gửi</button>
                    </form>
                    <div id="quick-msg"></div>
                </div>

                <!-- FORM PHẢN HỒI -->
                <div class="contact-box" style="background:white;padding:40px;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.08);">
                    <h3 style="color:#0D2488;font-size:1.8rem;margin-bottom:25px;">Gửi phản hồi cho chúng tôi</h3>
                    <p style="margin-bottom:30px;color:#555;line-height:1.7;">
                        Mọi ý kiến đóng góp của bạn đều quý giá để dự án ngày càng tốt hơn.<br>
                        <strong>Bạn có thể gửi phản hồi ẩn danh.</strong>
                    </p>

                    <form id="feedback-form">
                        <label style="display:block;margin-bottom:8px;color:#333;font-weight:600;">Tên hiển thị (không bắt buộc)</label>
                        <input type="text" name="fb_name" placeholder="Ẩn danh" style="width:100%;padding:14px;border:1px solid #ddd;border-radius:8px;margin-bottom:20px;font-size:1rem;">

                        <label style="display:block;margin-bottom:8px;color:#333;font-weight:600;">Thông tin liên lạc (không bắt buộc)</label>
                        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;margin-bottom:20px;">
                            <input type="email" name="fb_email" placeholder="Email" style="padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            <input type="text" name="fb_phone" placeholder="Số điện thoại" style="padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            <input type="url" name="fb_social" placeholder="Liên kết mạng xã hội" style="padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                        </div>

                        <label style="display:block;margin-bottom:8px;color:#333;font-weight:600;">Nội dung phản hồi <span style="color:#EB0452;">*</span></label>
                        <textarea name="fb_message" rows="7" required placeholder="Viết phản hồi của bạn tại đây..." style="width:100%;padding:14px;border:1px solid #ddd;border-radius:8px;font-size:1rem;resize:vertical;"></textarea>

                        <button type="submit" style="margin-top:25px;background:#0D2488;color:white;padding:16px 40px;border:none;border-radius:50px;cursor:pointer;font-weight:bold;font-size:1.1rem;">
                            Gửi phản hồi ngay
                        </button>
                    </form>
                    <div id="feedback-msg" style="margin-top:20px;"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// AJAX CHO 2 FORM
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

document.getElementById('quick-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const msg = document.getElementById('quick-msg');
    const email = form.email.value.trim();
    if (!validateEmail(email)) {
        msg.innerHTML = '<p style="padding:12px;border-radius:8px;background:#f8d7da;color:#721c24;">Email không hợp lệ.</p>';
        return;
    }
    fetch('<?= BASE_URL ?>/includes/send_contact.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(r => r.json())
    .then(data => {
        msg.innerHTML = `<p style="padding:12px;border-radius:8px;background:${data.success?'#d4edda': '#f8d7da'};color:${data.success?'#155724':'#721c24'};">${data.message}</p>`;
        if (data.success) {
            form.reset();
        }
    });
});

document.getElementById('feedback-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const msg = document.getElementById('feedback-msg');
    fetch('<?= BASE_URL ?>/includes/send_contact.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(r => r.json())
    .then(data => {
        msg.innerHTML = `<p style="padding:15px;border-radius:8px;font-weight:600;background:${data.success?'#d4edda': '#f8d7da'};color:${data.success?'#155724':'#721c24'};">${data.message}</p>`;
        if (data.success) {
            form.reset();
        }
    });
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>