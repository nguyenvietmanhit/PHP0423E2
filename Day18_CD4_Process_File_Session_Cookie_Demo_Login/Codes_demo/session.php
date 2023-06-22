<!--session.php
- Là 1 phiên làm việc, lưu trữ thông tin giữa user và
hệ thống
- Session mất khi đóng trình duyệt
- Chức năng thực tế: đăng nhập, giỏ hàng ...
- PHP tạo sẵn 1 mảng $_SESSION lưu toàn bộ session đang
có trên hệ thống
- Session đc lưu trên server, user sẽ ko thể biết đc
1 trang web đang có các session nào
- Bắt buộc phải khởi tạo session thì mới dùng đc $_SESSION
-->
<?php
session_start(); //khai báo ở ngay dưới thẻ mở php
// - Thao tác cơ bản với session: giống hệt thao tác
//với mảng
// + Thêm session
$_SESSION['address'] = 'HN';
$_SESSION['age'] = 33;
// + Hiển thị session:
echo $_SESSION['address'];
// + Xóa session:
unset($_SESSION['age']);
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
