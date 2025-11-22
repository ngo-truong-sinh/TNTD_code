// 1. Tìm phần tử nút bấm và menu trong HTML
const toggleButton = document.querySelector('.header__toggle');
const menu = document.querySelector('.header__menu');

// 2. Sự kiện "click" trên nút bấm
toggleButton.addEventListener('click', () => {
  // 3. Khi bấm, thêm/xóa class 'is-active' cho cả nút và menu
  toggleButton.classList.toggle('is-active');
  menu.classList.toggle('is-active');
});