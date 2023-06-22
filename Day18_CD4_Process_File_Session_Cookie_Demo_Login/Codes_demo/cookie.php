<!--cookie.php
Cookie trong PHP:
+ Lưu thông tin trên trình duyệt, nghĩa là có thể xem
đc 1 trang web lưu cookie gì vào trình duyệt
+ Ko tự mất đi khi đóng trình duyệt, mà phụ thuộc vào
thời gian sống đc set lúc tạo ra
+ Cookie dùng cho quảng cáo và tăng tốc độ tải trang
+ PHP tạo sẵn mảng $_COOKIES lưu toàn bộ thông tin cookie
đang có trên hệ thống
+ Cách xem cookie trên trình duyệt: Truy cập web muốn xem,
Inspect -> Application -> Storage
-->
<?php
// Thao tác với COOKIE:
// - Thêm cookie:
// $_COOKIE['class'] = 'PHP'; ko thêm như thêm mảng
setcookie('class', 'PHP', time() + 3600); //sống trong 1h
setcookie('age', 33, time() + 10);//sống trong 10s
// - Hiển thị:
echo $_COOKIE['class']; //PHP
// - Xóa: set thời gian sống là số âm
setcookie('age', '', time() - 1);
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
?>
