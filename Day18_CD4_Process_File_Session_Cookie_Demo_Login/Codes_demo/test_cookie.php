<!--test_cookie.php-->
<?php
// Cần chắc chắn cookie sinh ra thì mới thao tác
//đc
echo isset($_COOKIE['class']) ? $_COOKIE['class']
: ''; //PHP
?>
Sự giống và khác nhau của session và cookie
+ Giống nhau:
Đều dùng để lưu trữ theo cơ chế khởi tạo 1 lần và truy
cập đc từ mọi nơi
+ Khác nhau:
- Session lưu trên server, cookie lưu trên trình duyệt
- Session mất đi khi đóng trình duyệt, còn cookie phụ
thuộc vào thời gian sống
2/ Demo login đơn giản áp dụng session và cookie
Tạo cấu trúc thư mục:
demo_login /
           /login.php: xử lý form đăng nhập
           /profile.php: hiển thị thông tin user đăng
                         nhập thành công
           /logout.php: xử lý đăng xuất user
