<?php
// File: /testing_web/includes/footer.php
// Mô tả: Footer chung
?>
    <footer class="footer">
        <div class="footer__container container">
            <div class="footer__column footer__info">
                <h4 class="footer__title">Thiếu Nhi Thời Đại</h4>
                <p class="footer__description">
                    "Mỗi trẻ em Việt Nam đều có năng lực nhận biết, chăm sóc và bảo vệ đời sống tinh thần của chính mình – dù sống ở bất cứ đâu."
                </p>
            </div>

            <div class="footer__column footer__links">
                <h4 class="footer__title">Liên kết</h4>
                <ul class="links__list">
                    <li><a href="<?= BASE_URL ?>" class="links__item">Trang chủ</a></li>
                    <li><a href="<?= BASE_URL ?>/pages/about.php" class="links__item">Giới thiệu</a></li>
                    <li><a href="#" class="links__item">Tin tức</a></li>
                    <li><a href="#" class="links__item">Liên hệ</a></li>
                </ul>
            </div>

            <div class="footer__column footer__contact">
                <h4 class="footer__title">Kết nối</h4>
                <div class="footer__socials">
                    <a href="https://www.facebook.com/thieunhithoidai" class="social__link">
                        <img src="<?= asset('/images/facebook.png') ?>" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/thieunhithoidai.official/" class="social__link">
                        <img src="<?= asset('/images/instagram.png') ?>" alt="Instagram">
                    </a>
                </div>
                <h4 class="footer__title" style="margin: 1rem 0;">Email</h4>
                <p><a href="mailto:thieunhithoidai@thieunhithoidai.org" class="links__item">
                    thieunhithoidai@thieunhithoidai.org
                </a></p>
            </div>
        </div>

        <div class="footer__bottom container">
            <hr class="footer__separator">
            <p class="footer__bottom-text">© 2025 Thiếu Nhi Thời Đại. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>
</body>
</html>